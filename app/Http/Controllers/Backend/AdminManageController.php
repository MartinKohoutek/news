<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminManageController extends Controller
{
    public function AllAdmin() {
        $users = User::where('role', 'admin')->latest()->get();
        return view('backend.admin.all_admin', compact('users'));
    }
}
