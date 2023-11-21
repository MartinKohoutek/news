<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    public function AllPhotoGallery() {
        $photos = PhotoGallery::latest()->get();
        return view('backend.photo.all_photo', compact('photos'));
    }
}
