<?php

namespace App\Http\Controllers\Backend;

use DateTime;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }

    public function searchDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formatDate = $date->format('d-m-Y');

        $orders = Order::where('order_date', $formatDate)->latest()->get();
        return view('admin.statistical_order.index', compact('orders'));
    }

    public function searchMonthAndYear(Request $request)
    {
        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
        return view('admin.statistical_order.index', compact('orders'));
    }

    public function searchYear(Request $request)
    {
        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('admin.statistical_order.index', compact('orders'));
    }
}
