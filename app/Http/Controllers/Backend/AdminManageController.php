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

    public function EditAdmin($id) {
        $user = User::find($id);
        return view('backend.admin.edit_admin', compact('user'));
    }

    public function UpdateAdmin(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'admin';
        $user->status = 'inactive';
        $user->save();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Admin User Updated Successfully!',
        ];

        return redirect()->route('all.admin')->with($notification);
    }

    public function DeleteAdmin($id) {
        User::find($id)->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Admin User Deleted Successfully!',
        ];

        return redirect()->back()->with($notification);
    }

    public function ChangeAdminStatus(Request $request) {
        $user_id = $request->input('user_id');
        $is_checked = $request->input('is_checked', 'inactive');

        $user = User::find($user_id);
        if ($user) {
            $user->status = $is_checked == 'active' ? 'active' : 'inactive';
            $user->save();
        }

        return response()->json(['message' => 'Admin Status Updated Successfully!']);
    }
}
