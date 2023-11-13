<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function AllSubCategory() {
        $subcategories = Subcategory::latest()->get();
        return view('backend.subcategory.subcategory_all', compact('subcategories'));
    }

    public function AddSubCategory() {
        $categories = Category::orderBy('category_name')->get();
        return view('backend.subcategory.subcategory_add', compact('categories'));
    }

    public function StoreSubCategory(Request $request) {
        $request->validate([
            'subcategory_name' => 'unique:subcategories,subcategory_name',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'SubCategory Inserted Successfully!',
        ];

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function EditSubCategory($id) {
        $subcategory = Subcategory::find($id);
        $categories = Category::orderBy('category_name')->get();
        return view('backend.subcategory.subcategory_edit', compact('subcategory', 'categories'));
    }

    public function UpdateSubCategory(Request $request, $id) {
        $request->validate([
            'subcategory_name' => 'unique:subcategories,subcategory_name',
        ]);

        SubCategory::find($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'SubCategory Updated Successfully!',
        ];

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function DeleteSubCategory($id) {
        Subcategory::find($id)->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'SubCategory Deleted Successfully!',
        ];

        return redirect()->back()->with($notification);
    }
}
