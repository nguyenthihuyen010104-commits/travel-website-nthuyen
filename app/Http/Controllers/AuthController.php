<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Trang login
    public function showLogin()
    {
        return view('login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // Kiểm tra tài khoản
        if ($username == 'admin' && $password == '123456') {
            session([
                'isLogin' => true,
                'username' => $username
            ]);

            return redirect('/dashboard');
        }

        return redirect('/login')
            ->with('error', 'Sai tên đăng nhập hoặc mật khẩu');
    }

    // Dashboard
    public function dashboard()
    {
        if (!session('isLogin')) {
            return redirect('/login');
        }

        return view('dashboard');
    }

    // Logout
    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}
