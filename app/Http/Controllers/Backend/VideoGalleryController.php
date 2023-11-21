<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class VideoGalleryController extends Controller
{
    public function AllVideoGallery() {
        $videos = VideoGallery::latest()->get();
        return view('backend.video.all_video', compact('videos'));
    }

    public function AddVideoGallery() {
        return view('backend.video.add_video');
    }

    public function StoreVideoGallery(Request $request) {
        $image = $request->file('video_image');
        $imgName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $imgUrl = 'upload/video/'.$imgName;
        Image::make($image)->resize(720, 450)->save($imgUrl);

        VideoGallery::insert([
            'video_title' => $request->video_title,
            'video_url' => $request->video_url,
            'video_image' => $imgUrl,
            'post_date' => Carbon::now()->format('d F Y'),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Video Inserted Successfully!',
        ];

        return redirect()->route('all.video.gallery')->with($notification);
    }

    public function EditVideoGallery($id) {
        $video = VideoGallery::findOrFail($id);
        return view('backend.video.edit_video', compact('video'));
    }

    public function UpdateVideoGallery(Request $request) {
        $video = VideoGallery::findOrFail($request->id);

        if ($request->file('video_image')) {
            $image = $request->file('video_image');
            @unlink($video->video_image);
            $imgName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $imgUrl = 'upload/video/'.$imgName;
            Image::make($image)->resize(720, 450)->save($imgUrl);
            $video->update(['video_image' => $imgUrl]);
        }

        $video->update([
            'video_title' => $request->video_title,
            'video_url' => $request->video_url,
            'post_date' => Carbon::now()->format('d F Y'),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Video Updated Successfully!',
        ];

        return redirect()->route('all.video.gallery')->with($notification);
    }

    public function DeleteVideoGallery($id) {
        $video = VideoGallery::findOrFail($id);
        unlink($video->video_image);
        $video->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Video Deleted Successfully!',
        ];

        return redirect()->back()->with($notification);
    }
}
