<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Slider::latest()->paginate(7);
        return view('admin.slider.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slider_title_vi' => 'required',
            'slider_title_en' => 'required',
            'slider_description_vi' => 'required',
            'slider_description_en' => 'required',
            'slider_image' => 'required|max:2048',
        ]);

        // Upload product thumbnail
        if ($request->hasFile('slider_image')) {
            $image = $request->file('slider_image');
            $getFileName = uniqid() . '_' . date('m_Y') . '_' . $image->getClientOriginalName();
            Image::make($image)->resize(400, 200)->save('upload/slider/' . $getFileName);
            $saveImage = $getFileName;
        }

        $params = [
            'slider_title_vi' => $request->slider_title_vi,
            'slider_title_en' => $request->slider_title_en,
            'slider_description_vi' => $request->slider_description_vi,
            'slider_description_en' => $request->slider_description_en,
            'slider_image' => $saveImage,
            'status' => 1,
            'created_at' => Carbon::now(),
        ];
        Slider::insert($params);

        $notification = array(
            'message' => 'Create Slider Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('slider.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'slider_title_vi' => 'required',
            'slider_title_en' => 'required',
            'slider_description_vi' => 'required',
            'slider_description_en' => 'required',
        ]);

        $params = [
            'slider_title_vi' => $request->slider_title_vi,
            'slider_title_en' => $request->slider_title_en,
            'slider_description_vi' => $request->slider_description_vi,
            'slider_description_en' => $request->slider_description_en,
            'status' => 1,
        ];

        $oldImage = $request->old_image;
        if ($request->hasFile('slider_image')) {
            @unlink('upload/slider/' . $oldImage);
            $image = $request->file('slider_image');
            $getFileName = uniqid() . '_' . date('m_Y') . '_' . $image->getClientOriginalName();
            Image::make($image)->resize(400, 200)->save('upload/slider/' . $getFileName);
            $params['slider_image'] = $getFileName;
        }
        Slider::findOrFail($id)->update($params);

        $notification = array(
            'message' => 'Update Slider Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('slider.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        $image = $slider->slider_image;
        if ($image != '') {
            @unlink('upload/slider/' . $image);
        }
        $slider->delete();

        $notification = array(
            'message' => 'Delete Slider Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('slider.index')->with($notification);
    }

    public function inactive($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Inactive Slider Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('slider.index')->with($notification);
    }

    public function active($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Active Slider Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('slider.index')->with($notification);
    }
}
