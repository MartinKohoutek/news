<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function AllPermission() {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }

    public function AddPermission() {
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request) {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Permission Inserted Successfully!',
        ];

        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id) {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);
        Permission::findOrFail($request->id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Permission Updated Successfully!',
        ];

        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id) {
        Permission::findOrFail($id)->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Permission Deleted Successfully!',
        ];

        return redirect()->back()->with($notification);
    }
}
