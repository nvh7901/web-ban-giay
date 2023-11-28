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
}
