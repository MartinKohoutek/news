<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminManageController extends Controller
{
    public function AllAdmin() {
        $users = User::where('role', 'admin')->latest()->get();
        return view('backend.admin.all_admin', compact('users'));
    }

    public function AddAdmin() {
        $roles = Role::all();
        return view('backend.admin.add_admin', compact('roles'));
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

        if ($request->role) {
            $user->assignRole($request->role);
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'New Admin User Created Successfully!',
        ];

        return redirect()->route('all.admin')->with($notification);
    }

    public function EditAdmin($id) {
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.admin.edit_admin', compact('user', 'roles'));
    }

    public function UpdateAdmin(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->role) {
            $user->assignRole($request->role);
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Admin User Updated Successfully!',
        ];

        return redirect()->route('all.admin')->with($notification);
    }

    public function DeleteAdmin($id) {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

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
