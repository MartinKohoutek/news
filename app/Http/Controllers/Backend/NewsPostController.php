<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

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

    public function StoreNewsPost(Request $request) {
        $image = $request->file('image');
        $imgName = hexdec(uniqid()).$image->getClientOriginalExtension();
        $imgUrl = 'upload/news/'.$imgName;
        Image::make($image)->resize(720, 450)->save($imgUrl);

        NewsPost::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_title_slug' => strtolower(str_replace(' ', '-', $request->news_title)),
            'image' => $imgUrl,
            'news_details' => $request->news_details,
            'tags' => $request->tags,
            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_section_three' => $request->first_section_three,
            'first_section_nine' => $request->first_section_nine,
            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'News Post Inserted Successfully!',
        ];

        return redirect()->route('all.news.post')->with($notification);
    }

    public function EditNewsPost($id) {
        $newspost = NewsPost::find($id);
        $categories = Category::orderBy('category_name')->get();
        $subcategories = Subcategory::where('category_id', $newspost->category_id)->latest()->get();
        return view('backend.news.edit_news_post', compact('newspost', 'categories', 'subcategories'));
    }

    public function UpdateNewsPost(Request $request, $id) {
        $newspost = NewsPost::find($id);

        if ($request->file('image')) {
            $image = $request->file('image');
            unlink($newspost->image);
            $imgName = hexdec(uniqid()).$image->getClientOriginalExtension();
            $imgUrl = 'upload/news/'.$imgName;
            Image::make($image)->resize(720, 450)->save($imgUrl);
            $newspost->update(['image' => $imgUrl]);
        }
            
        $newspost->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'news_title' => $request->news_title,
            'news_title_slug' => strtolower(str_replace(' ', '-', $request->news_title)),
            'news_details' => $request->news_details,
            'tags' => $request->tags,
            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_section_three' => $request->first_section_three,
            'first_section_nine' => $request->first_section_nine,
            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'News Post Updated Successfully!',
        ];

        return redirect()->route('all.news.post')->with($notification);
    }

    public function DeleteNewsPost($id) {
        $newspost = NewsPost::find($id);
        if ($newspost->image) {
            unlink($newspost->image);
        }

        $newspost->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'News Post Deleted Successfully!',
        ];

        return redirect()->back()->with($notification);
    }

    public function ChangePostStatus(Request $request) {
        $is_checked = $request->input('is_checked', 0);

        $post = NewsPost::find($request->input('post_id'));
        if ($post) {
            $post->status = $is_checked;
            $post->save();
        }

        return response()->json(['message' => 'News Post Status Updated Successfully!']);
    }
}
