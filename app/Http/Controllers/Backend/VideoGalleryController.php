<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function AllVideoGallery() {
        $videos = VideoGallery::latest()->get();
        return view('backend.video.all_video', compact('videos'));
    }
}
