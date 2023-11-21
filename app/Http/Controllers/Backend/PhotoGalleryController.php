<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class PhotoGalleryController extends Controller
{
    public function AllPhotoGallery() {
        $photos = PhotoGallery::latest()->get();
        return view('backend.photo.all_photo', compact('photos'));
    }

    public function AddPhotoGallery() {
        return view('backend.photo.add_photo');
    }

    public function StorePhotoGallery(Request $request) {
        $images = $request->file('multi_image');
       
        foreach ($images as $image) {
            $imgName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(700, 400)->save('upload/photos/'.$imgName);
            $saveUrl = 'upload/photos/'.$imgName;
            PhotoGallery::insert([
                'photo_gallery' => $saveUrl,
                'photo_title' => $request->photo_title,
                'post_date' => Carbon::now()->format('d F Y'),
            ]);
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Photos Inserted Successfully!',
        ];

        return redirect()->route('all.photo.gallery')->with($notification);
    }

    public function EditPhotoGallery($id) {
        $photo = PhotoGallery::findOrFail($id);
        return view('backend.photo.edit_photo', compact('photo'));
    }

    public function UpdatePhotoGallery(Request $request) {
        $photo = PhotoGallery::findOrFail($request->id);

        if ($request->file('photo_gallery')) {
            $image = $request->file('photo_gallery');
            unlink($photo->photo_gallery);
            $imgName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(700, 400)->save('upload/photos/'.$imgName);
            $saveUrl = 'upload/photos/'.$imgName;
            $photo->update(['photo_gallery' => $saveUrl]);
        }

        $photo->update(['photo_title' => $request->photo_title]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Photo Gallery Updated Successfully!',
        ];

        return redirect()->route('all.photo.gallery')->with($notification);
    }

    public function DeletePhotoGallery($id) {
        $photo = PhotoGallery::findOrFail($id);
        unlink($photo->photo_gallery);
        $photo->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Photo Deleted Successfully!',
        ];

        return redirect()->back()->with($notification);
    }
}
