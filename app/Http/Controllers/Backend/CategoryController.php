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
}
