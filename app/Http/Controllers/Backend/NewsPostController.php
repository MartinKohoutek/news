<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    public function AllNewsPost() {
        $allnews = NewsPost::latest()->get();
        return view('backend.news.all_news_post', compact('allnews'));
    }

    public function AddNewsPost() {
        $categories = Category::orderBy('category_name')->get();
        $subcategories = Subcategory::latest()->get();
        $users = User::where('role', 'admin')->orderBy('name')->get();
        return view('backend.news.add_news_post', compact('categories', 'subcategories', 'users'));
    }

    public function GetSubCategory($id) {
        $subcategories = Subcategory::where('category_id', $id)->orderBy('subcategory_name')->get();
        return json_encode($subcategories);
    }
}
