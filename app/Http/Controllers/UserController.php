<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function UserLogout(Request $request) {
        Auth::guard('web')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        $notification = [
            'alert-type' => 'success',
            'message' => 'User Logout Successfully!',
        ];

        return redirect('/')->with($notification);
    }

    public function UserChangePassword() {
        $user = User::find(Auth::user()->id);
        return view('frontend.user_change_password', compact('user'));
    }

    public function UserUpdatePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with('error', 'Old Password Does Not Match!');
        }

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('status', 'Password Changed Successfully!');
    }
}
