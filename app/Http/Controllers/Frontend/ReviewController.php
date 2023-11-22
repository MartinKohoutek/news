<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function StoreReview(Request $request) {
        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([
            'news_id' => $request->news_id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('status', 'Comment will be approved by Admin');
    }
}
