<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validation bắt buộc theo đề bài
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Mã hóa pass
            'role' => 'user'
        ]);
        return redirect('/login')->with('success', 'Đăng ký thành công!');
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Lưu session phân quyền truy cập
            session([
                'isLogin' => true,
                'user_id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'role' => $user->role
            ]);

            if ($user->role == 'admin') return redirect('/admin/dashboard');
            return redirect('/');
        }
        return back()->with('error', 'Sai tài khoản hoặc mật khẩu');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
