<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard() {
        return view('admin.index');
    }

    public function AdminLogout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $notification = [
            'alert-type' => 'info',
            'message' => 'Admin Logout Successfully!',
        ];

        return redirect()->route('admin.login')->with($notification);
    }

    public function AdminLogin() {
        return view('admin.admin_login');
    }

    public function AdminProfile() {
        $user = User::find(Auth::user()->id);
        return view('admin.admin_profile', compact('user'));
    }

    public function AdminProfileStore(Request $request) {
        $request->validate([
            'description' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->description = $request->description;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->linkedin = $request->linkedin;
        $user->googleplus = $request->googleplus;

        if ($request->file('photo')) {
            $img = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$user->photo));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move(public_path('upload/admin_images'), $imgName);
            $user->photo = $imgName;
        }

        $user->save();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Profile Updated Successfully!',
        ];

        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword() {
        $user = User::find(Auth::user()->id);
        return view('admin.admin_change_password', compact('user'));
    }

    public function AdminUpdatePassword(Request $request) {
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
