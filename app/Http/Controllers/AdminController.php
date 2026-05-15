<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Kiểm tra quyền Admin
        if (!session('isLogin') || session('role') != 'admin') {
            return redirect('/login')->with('error', 'Bạn không có quyền truy cập trang quản trị');
        }
        return view('admin.dashboard');
    }

    public function users()
    {
        if (!session('isLogin') || session('role') != 'admin') {
            return redirect('/login')->with('error', 'Bạn không có quyền truy cập trang quản trị');
        }
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}
