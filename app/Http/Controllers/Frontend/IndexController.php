<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
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

        // $latestNews = NewsPost::orderBy('id', 'DESC')->limit(8)->get();
        // $popularNews = NewsPost::orderBy('view_count', 'DESC')->limit(8)->get();

        $newsKey = 'blog'.$news->id;
        if (!Session::has($newsKey)) {
            $news->increment('view_count');
            Session::put($newsKey, 1);
        }

        return view('frontend.news.news_details', compact('news', 'tags', 'relatedNews', 'countAuthorPosts'));
    }

    public function NewsCategory($id, $slug) {
        $news = NewsPost::where('status', 1)->where('category_id', $id)->orderBy('id', 'DESC')->paginate(2);
        $cat = Category::where('id', $id)->first();
        return view('frontend.news.news_category', compact('news', 'cat'));
    }

    public function NewsSubCategory($id, $slug) {
        $news = NewsPost::where('status', 1)->where('subcategory_id', $id)->orderBy('id', 'DESC')->paginate(2);
        $subcat = Subcategory::where('id', $id)->first();
        return view('frontend.news.news_subcategory', compact('news', 'subcat'));
    }
}
