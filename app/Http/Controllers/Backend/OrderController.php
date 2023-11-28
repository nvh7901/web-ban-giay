<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders =  Order::where('status', 'PENDING')->orderBy('id', 'DESC')->paginate(7);
        return view('admin.order.pending.index', compact('orders'));
    }

    public function detailPending($id)
    {
        $orders = Order::with('province', 'district', 'ward', 'user')
            ->where('id', $id)->first();
        $orderItems = OrderItem::with('product')
            ->where('order_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.order.pending.detail', compact('orders', 'orderItems'));
    }

    public function confirmOrder($id)
    {
        Order::findOrFail($id)->update([
            'status' => 'CONFIRM',
        ]);
        $notification = array(
            'message' => 'Create District Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('order.pending')->with($notification);
    }

    public function indexConfirm()
    {
        $orders = Order::where('status', 'CONFIRM')->orderBy('id', 'DESC')->paginate(7);
        return view('admin.order.confirm.index', compact('orders'));
    }

    public function detailConfirm($id)
    {
        $orders = Order::with('province', 'district', 'ward', 'user')
            ->where('id', $id)->first();
        $orderItems = OrderItem::with('product')
            ->where('order_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.order.pending.detail', compact('orders', 'orderItems'));
    }
}
