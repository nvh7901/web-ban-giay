<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Ward;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ward::latest()->paginate(7);
        return view('admin.ship.ward.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataProvinces = Province::orderBy('id', 'DESC')->get();
        return view('admin.ship.ward.create', compact('dataProvinces'));
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
            'ward_name' => 'required',
        ]);

        $params = [
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'ward_name' => $request->ward_name,
            'created_at' => Carbon::now()
        ];
        Ward::insert($params);

        $notification = array(
            'message' => 'Create Ward Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('ward.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataProvinces = Province::latest()->get();
        $dataDistricts = District::latest()->get();
        $ward = Ward::findOrFail($id);
        return view('admin.ship.ward.edit', compact('dataProvinces', 'dataDistricts', 'ward'));
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
            'ward_name' => 'required',
        ]);

        $params = [
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'ward_name' => $request->ward_name,
        ];
        Ward::findOrFail($id)->update($params);

        $notification = array(
            'message' => 'Update Ward Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('ward.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
