<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Coupon::latest()->paginate(7);
        return view('admin.coupon.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_date' => 'required',
        ]);

        $params = [
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_date' => $request->coupon_date,
            'created_at' => Carbon::now(),
        ];
        Coupon::insert($params);

        $notification = array(
            'message' => 'Create Coupon Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('coupon.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_date' => 'required',
        ]);

        $params = [
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_date' => $request->coupon_date,
        ];
        Coupon::findOrFail($id)->update($params);

        $notification = array(
            'message' => 'Update Coupon Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('coupon.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Coupon::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Delete Coupon Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('coupon.index')->with($notification);
    }
}
