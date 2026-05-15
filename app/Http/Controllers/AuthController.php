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
<<<<<<< HEAD

=======
>>>>>>> 1cb7498bdf98f2dbb4544b765b52244309071c2b
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
<<<<<<< HEAD
=======
        // Validation bắt buộc theo đề bài
>>>>>>> 1cb7498bdf98f2dbb4544b765b52244309071c2b
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
<<<<<<< HEAD
            'password' => Hash::make($request->password)
        ]);
        return redirect('/login')
            ->with('success', 'Đăng ký tài khoản thành công');
=======
            'password' => Hash::make($request->password), // Mã hóa pass
            'role' => 'user'
        ]);
        return redirect('/login')->with('success', 'Đăng ký thành công!');
>>>>>>> 1cb7498bdf98f2dbb4544b765b52244309071c2b
    }

    public function login(Request $request)
    {
<<<<<<< HEAD
        $username = $request->username;
        $password = $request->password;

        $user = User::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            session([
                'isLogin' => true,
                'username' => $user->username,
                'name' => $user->name,
                'email' => $user->email,
                'user_id' => $user->id,
                'login_time' => now()->format('d/m/Y H:i:s')
            ]);

            return redirect('/dashboard');
        }

        return redirect('/login')
            ->with('error', 'Sai tên đăng nhập hoặc mật khẩu');
    }

    public function dashboard()
    {
        if (!session('isLogin')) {
            return redirect('/login');
        }

        return view('dashboard');
=======
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
>>>>>>> 1cb7498bdf98f2dbb4544b765b52244309071c2b
    }

    public function logout()
    {
        session()->flush();
<<<<<<< HEAD

=======
>>>>>>> 1cb7498bdf98f2dbb4544b765b52244309071c2b
        return redirect('/login');
    }
}
