<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Utilities\Constant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthenticationController extends Controller
{
    // Login
    public function getUserLogin()
    {
        return view('frontend.user_login');
    }

    public function postUserLogin(Request $request)
    {
        $params = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => Constant::user_level_user,
        ];

        if (Auth::attempt($params)) {
            return redirect()->intended('/');
        } else {
            $user = User::where('email', $request->email)->first();
            if ($user && $user->level != Constant::user_level_user) {
                // Level không đúng, hiển thị thông báo lỗi.
                return back()->with('notification', 'You do not have access');
            }
        }
        return back()->with('notification', 'Email or password is incorrect');
    }

    // Logout
    public function userLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    // Register
    public function getUserRegister()
    {
        return view('frontend.user_login');
    }

    public function postUserRegister(Request $request)
    {
        $params = [
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'level' => Constant::user_level_user
        ];

        User::create($params);
        return redirect('/login');
    }

    // Forget Password
    public function getForgetPassword()
    {
        return view('frontend.forget_password.email');
    }
    public function postForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('frontend.forget_password.verify_password', ['token' => $token], function ($message) use ($request) {
            // $message->from('flipmart.shose@example.com');
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('notification', 'We have e-mailed your password reset link!');
    }

    // Reset Password
    public function getResetPassword($token)
    {
        return view('frontend.forget_password.reset_password', ['token' => $token]);
    }

    public function postResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        if (!$updatePassword) {
            return back()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return redirect('/login')->with('notification', 'Your password has been changed!');
    }
}
