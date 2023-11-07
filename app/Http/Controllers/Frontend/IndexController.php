<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function dashboard()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.dashboard', compact('user'));
    }

    // Update Profile
    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function userProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        // Upload file
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            if (file_exists(public_path('upload/user_images/' . $data->avatar))) {
                @unlink(public_path('upload/user_images/' . $data->avatar));
            }
            $getFileName = date('Y_m') . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $getFileName);
            $data['avatar'] = $getFileName;
        }
        $data->save();

        // Thông báo
        $notification = array(
            'message' => 'Update Profile Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.dashboard')->with($notification);
    }

    // Update Password
    public function getChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_change_password', compact('user'));
    }

    public function postChangePassword(Request $request)
    {
        $id = Auth::user()->id;
        $hashPassword = User::find($id)->password;
        if (Hash::check($request->oldpassword, $hashPassword)) {
            $data = User::find($id);
            $data->password = Hash::make($request->password);
            $data->save();
            // Thay đổi xong mk sẽ logout ra
            $notification = array(
                'message' => 'Update Password Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('user.dashboard')->with($notification);
        } else {
            return redirect()->back();
        }
    }
}
