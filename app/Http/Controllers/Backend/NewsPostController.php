<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    public function AllNewsPost() {
        $allnews = NewsPost::latest()->get();
        return view('backend.news.all_news_post', compact('allnews'));
    }
}
