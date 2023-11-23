<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function StoreRolesPermission(Request $request) {
        $data = [];
        $permissions = $request->permission;

        foreach ($permissions as $item) {
            $data['role_id'] = $request->role;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Role in Permission Inserted Successfully!',
        ];

        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AllRolesPermission() {
        $roles = Role::all();
        return view('backend.pages.roles.all_roles_permission', compact('roles'));
    }

    public function EditRolesPermission($id) {
        $roles = Role::all();
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permissionGroups = User::getPermissionGroups();

        return view('backend.pages.roles.edit_roles_permission', compact('role', 'permissions', 'permissionGroups', 'roles'));
    }

    public function UpdateRolesPermission(Request $request, $id) {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        // dd($permissions);
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Role in Permission Updated Successfully!',
        ];

        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function DeleteRolesPermission($id) {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Role in Permission Deleted Successfully!',
        ];

        return redirect()->back()->with($notification);
    }
}
