<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            $user = User::where('email', $request->email)->first();
            if ($user && $user->level != Constant::user_level_admin) {
                // Level không đúng, hiển thị thông báo lỗi.
                return back()->with('notification', 'You do not have access');
            }
        }
        return back()->with('notification', 'Email or password not correct');
    }
    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
