<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Ward;
use App\Models\Order;
use App\Models\Category;
use App\Models\District;
use App\Models\Province;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    // Đặt Hàng
    public function checkout()
    {
        if (Cart::total() > 0) {
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = Cart::total();
            // List ra categories
            $categories = Category::orderBy('id', 'ASC')->get();
            $dataProvinces = Province::orderBy('id', 'ASC')->get();
            return view('frontend.checkout.index', compact('carts', 'cartQty', 'cartTotal', 'categories', 'dataProvinces'));
        } else {
            $notification = array(
                'message' => 'Cart at list one product',
                'alert-type' => 'error',
            );
            return redirect()->to('/')->with($notification);
        }
    }

    public function getDataDistrict($province_id)
    {
        $district = District::where('province_id', $province_id)->orderBy('id', 'ASC')->get();
        return json_encode($district);
    }

    public function getDataWard($district_id)
    {
        $ward = Ward::where('district_id', $district_id)->orderBy('id', 'ASC')->get();
        return json_encode($ward);
    }

    public function checkoutStore(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = Cart::total();
            // dd($total_amount);
        }

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'ward_id' => $request->ward_id,
            'ship_name' => $request->ship_name,
            'ship_email' => $request->ship_email,
            'ship_phone' => $request->ship_phone,
            'notes' => $request->notes,
            'ship_address' => $request->ship_address,
            'post_code' => mt_rand(100000, 999999),
            'payment_type' => 'Cash',
            'payment_method' => 'Cash',

            'amount' => $total_amount,
            'invoice_no' => 'VH' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d-m-Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'PENDING',
            'created_at' => Carbon::now(),
        ]);
        // dd($order_id);

        $carts = Cart::content();
        foreach ($carts as $cart) {
            $orderItem = OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success'
        );

        return redirect('/')->with($notification);
    }
}
