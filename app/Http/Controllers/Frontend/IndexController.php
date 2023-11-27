<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'ASC')->limit(5)->get();
        $products = Product::where('status', 1)->orderBy('id', 'ASC')->limit(10)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(10)->get();
        $hotDeals = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->limit(5)->get();
        $specialOffer = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(5)->get();
        $pecialDeal = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(5)->get();
        return view(
            'frontend.index',
            compact('categories', 'sliders', 'products', 'featured', 'hotDeals', 'specialOffer', 'pecialDeal')
        );
    }

    public function dashboard()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('frontend.dashboard', compact('user', 'categories'));
    }

    // Update Profile
    public function userProfile()
    {
        $categories = Category::orderBy('id', 'ASC')->get();
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user', 'categories'));
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
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('frontend.profile.user_change_password', compact('user', 'categories'));
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

    // Order
    public function getMyOrder()
    {
        $categories = Category::orderBy('id', 'ASC')->get();
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(7);
        return view('frontend.order.index', compact('categories', 'orders'));
    }
}
