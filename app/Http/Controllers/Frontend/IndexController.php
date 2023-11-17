<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function Index() {
        return view('frontend.index');
    }

    public function NewsDetails($id, $slug) {
        $news = NewsPost::findOrFail($id);
        $tags = explode(',', $news->tags);
        $relatedNews = NewsPost::orderbyRaw('category_id ='.$news->category_id.' DESC')
            ->where('id', '!=', $news->id)
            ->where('status', 1)
            ->latest()
            ->limit(6)
            ->get();
        $countAuthorPosts = NewsPost::where('user_id', $news->user_id)->count();

        $newsKey = 'blog'.$news->id;
        if (!Session::has($newsKey)) {
            $news->increment('view_count');
            Session::put($newsKey, 1);
        }

        return view('frontend.news.news_details', compact('news', 'tags', 'relatedNews', 'countAuthorPosts'));
    }
}
