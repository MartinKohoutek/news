<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCategory() {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('backend.category.category_all', compact('categories'));
    }

    public function AddCategory() {
        return view('backend.category.category_add');
    }

    public function StoreCategory(Request $request) {
        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Category Inserted Successfully!',
        ];

        return redirect()->route('all.category')->with($notification);
    }

    public function EditCategory($id) {
        $category = Category::find($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function UpdateCategory(Request $request) {
        Category::find($request->id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Category Updated Successfully!',
        ];

        return redirect()->route('all.category')->with($notification);
    }

    public function DeleteCategory($id) {
        Category::find($id)->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Category Deleted Successfully!',
        ];

        return redirect()->back()->with($notification);
    }
}
