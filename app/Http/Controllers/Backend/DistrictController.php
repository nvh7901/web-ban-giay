<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = District::latest()->paginate(7);
        return view('admin.ship.district.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataProvinces = Province::orderBy('id', 'DESC')->get();
        return view('admin.ship.district.create', compact('dataProvinces'));
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
            'province_id' => 'required|numeric',
            'district_name' => 'required',
        ]);

        $params = [
            'province_id' => $request->province_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now()
        ];
        District::insert($params);

        $notification = array(
            'message' => 'Create District Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('district.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataProvinces = Province::orderBy('id', 'DESC')->get();
        $district = District::findOrFail($id);
        return view('admin.ship.district.edit', compact('dataProvinces', 'district'));
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
            'province_id' => 'required|numeric',
            'district_name' => 'required',
        ]);

        $params = [
            'province_id' => $request->province_id,
            'district_name' => $request->district_name,
        ];
        District::findOrFail($id)->update($params);

        $notification = array(
            'message' => 'Update District Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('district.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        District::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Delete District Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('district.index')->with($notification);
    }

    public function getDropDownDistrict($province_id)
    {
        $district = District::where('province_id', $province_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($district);
    }
}
