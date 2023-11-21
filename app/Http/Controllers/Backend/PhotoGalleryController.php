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
}
