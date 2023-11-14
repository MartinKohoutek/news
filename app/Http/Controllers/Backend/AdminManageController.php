<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminManageController extends Controller
{
    public function AllAdmin() {
        $users = User::where('role', 'admin')->latest()->get();
        return view('backend.admin.all_admin', compact('users'));
    }

    public function AddAdmin() {
        return view('backend.admin.add_admin');
    }

    public function StoreAdmin(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'inactive';
        $user->save();

        $notification = [
            'alert-type' => 'success',
            'message' => 'New Admin User Created Successfully!',
        ];

        return redirect()->route('all.admin')->with($notification);
    }
}
