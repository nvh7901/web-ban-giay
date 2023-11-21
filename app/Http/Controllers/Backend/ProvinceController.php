<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Province::latest()->paginate(7);
        return view('admin.ship.province.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ship.province.create');
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
            'province_name' => 'required',
        ]);

        $params = [
            'province_name' => $request->province_name,
            'created_at' => Carbon::now(),
        ];
        Province::insert($params);

        $notification = array(
            'message' => 'Create Province Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('province.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $province = Province::findOrFail($id);
        return view('admin.ship.province.edit', compact('province'));
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
            'province_name' => 'required',
        ]);

        $params = [
            'province_name' => $request->province_name,
        ];
        Province::findOrFail($id)->update($params);

        $notification = array(
            'message' => 'Update Province Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('province.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Province::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Delete Province Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('province.index')->with($notification);
    }
}
