<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile', compact('adminData'));
    }

    // Profile
    public function adminProfileEdit(Request $request)
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function adminProfileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        // Upload file
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            unlink(public_path('upload/admin_images/' . $data->avatar));
            $getFileName = date('Y_m') . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $getFileName);
            $data['avatar'] = $getFileName;
        }
        $data->save();

        // Thông báo
        $notification = array(
            'message' => 'Update Profile Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    // Password
    public function adminProfileEditPassword()
    {
        return view('admin.admin_change_password');
    }

    public function adminProfileUpdatePassword(Request $request)
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
            return redirect()->route('admin.password.edit')->with($notification);
        } else {
            return redirect()->back();
        }
    }
}
