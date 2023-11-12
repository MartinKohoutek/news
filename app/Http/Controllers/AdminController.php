<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard() {
        return view('admin.index');
    }

    public function AdminLogout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function AdminLogin() {
        return view('admin.admin_login');
    }

    public function AdminProfile() {
        $user = User::find(Auth::user()->id);
        return view('admin.admin_profile', compact('user'));
    }

    public function AdminProfileStore(Request $request) {
        $user = User::find(Auth::user()->id);
        
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->file('photo')) {
            $img = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$user->photo));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move(public_path('upload/admin_images'), $imgName);
            $user->photo = $imgName;
        }

        $user->save();

        return redirect()->back();
    }
}
