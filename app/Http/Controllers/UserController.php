<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserDashboard() {
        $user = User::find(Auth::user()->id);
        return view('frontend.user_dashboard', compact('user'));
    }

    public function UserProfileStore(Request $request) {
        $user = User::find(Auth::user()->id);
        
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->file('photo')) {
            $img = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$user->photo));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move(public_path('upload/user_images'), $imgName);
            $user->photo = $imgName;
        }

        $user->save();

        return back()->with('status', 'Profile Updated Successfully!');
    }
}
