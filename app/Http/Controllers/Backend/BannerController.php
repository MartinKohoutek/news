<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function AllBanners() {
        $banners = Banner::findOrFail(1);
        return view('backend.banner.banner_update', compact('banners'));
    }
}
