<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utilities\Constant;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Login Admin
    public function getLogin()
    {
        return view('admin.admin_login');
    }

    public function postLogin(Request $request)
    {
        $params = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => Constant::user_level_admin,
        ];
        $remember = $request->remember;

        if (Auth::attempt($params, $remember)) {
            return redirect()->intended('admin/dashboard');
        } else {
            return back()->with('notification', 'Email or password not correct');
        }
    }
    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
