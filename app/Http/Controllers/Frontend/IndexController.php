<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use DateTime;
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

    public function NewsArchive() {
        $news = NewsPost::latest()->paginate(5);
        return view('frontend.news.news_archive', compact('news'));
    }

    public function SearchByDate(Request $request) {
        $date = (new DateTime($request->date))->format('d-m-Y');
        $news = NewsPost::where('post_date', $date)->latest()->paginate(5);
        return view('frontend.news.news_search_by_date', compact('news', 'date'));
    }

    public function NewsSearch(Request $request) {
        $request->validate(['search' => 'required']);
        $searchTerm = $request->search;
        $news = NewsPost::where('status', '1')->where('news_title', 'LIKE', '%'.$request->search.'%')
            ->orWhere('news_details', 'LIKE', '%'.$request->search.'%')->paginate(5)->withQueryString();
        return view('frontend.news.search', compact('news', 'searchTerm'));
    }
}
