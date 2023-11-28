<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use App\Notifications\ReviewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ReviewController extends Controller
{
    public function StoreReview(Request $request) {
        $users = User::where('role', 'admin')->get();

        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([
            'news_id' => $request->news_id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        Notification::send($users, new ReviewNotification($request));
        return back()->with('status', 'Comment will be approved by Admin');
    }

    public function PendingReview() {
        $reviews = Review::where('status', 0)->latest()->get();
        return view('backend.review.pending_review', compact('reviews'));
    }

    public function ApproveReview($id) {
        Review::where('id', $id)->update(['status' => 1]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Review Approved Successfully!',
        ];

        return redirect()->back()->with($notification);
    }

    public function ApprovedReview() {
        $reviews = Review::where('status', 1)->latest()->get();
        return view('backend.review.approved_review', compact('reviews'));
    }

    public function DeleteReview($id) {
        Review::findOrFail($id)->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Review Deleted Successfully!',
        ];

        return redirect()->back()->with($notification);
    }

    public function UserComments() {
        $comments = Review::where('user_id', Auth::user()->id)->latest()->get();
        return view('frontend.user_comments', compact('comments'));
    }

    public function DeleteComment($id) {
        Review::findOrFail($id)->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Comment Deleted Successfully!',
        ];

        return redirect()->back()->with($notification);
    }

    public function EditComment($id) {
        $comment = Review::findOrFail($id);
        return view('frontend.user_edit_comment', compact('comment'));
    }

    public function UpdateComment(Request $request) {
        Review::findOrFail($request->id)->update(['comment' => $request->comment]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Comment Updated Successfully!',
        ];

        return redirect()->route('user.comments')->with($notification);
    }
}
