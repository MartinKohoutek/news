<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

    public function AllRoles() {
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    }

    public function AddRoles() {
        return view('backend.pages.roles.add_roles');
    }

    public function StoreRoles(Request $request) {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        Role::create([
            'name' => $request->name,
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Role Created Successfully!',
        ];

        return redirect()->route('all.roles')->with($notification);
    }

    public function EditRoles($id) {
        $role = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles', compact('role'));
    }

    public function UpdateRoles(Request $request) {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::findOrFail($request->id)->update([
            'name' => $request->name,
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Role Updated Successfully!',
        ];

        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRoles($id) {
        Role::findOrFail($id)->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Role Deleted Successfully!',
        ];

        return redirect()->back()->with($notification);
    }

    public function AddRolesPermission() {
        $roles = Role::all();
        $permissions = Permission::all();
        $permissionGroups = User::getPermissionGroups();

        return view('backend.pages.roles.add_roles_permission', compact('roles', 'permissions', 'permissionGroups'));
    }
}
