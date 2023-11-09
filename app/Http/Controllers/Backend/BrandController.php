<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Nette\Utils\Random;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Brand::latest()->paginate(7);
        return view('admin.brand.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name_vi' => 'required',
            'brand_name_en' => 'required',
            'brand_image' => 'required'
        ]);

        if ($request->file('brand_image')) {
            $image = $request->file('brand_image');
            $getFileName = uniqid() . '_' . date('m_Y') . '_' . $image->getClientOriginalName();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $getFileName);
            $saveImage = $getFileName;
        }

        $params = [
            'brand_name_vi' => $request->brand_name_vi,
            'brand_name_en' => $request->brand_name_en,
            'brand_slug_vi' => strtolower(str_replace(' ', '-', $request->brand_name_vi)),
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_image' => $saveImage,
        ];

        Brand::insert($params);
        $notification = array(
            'message' => 'Create Brand Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('brand.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::findorFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name_vi' => 'required',
            'brand_name_en' => 'required',
            'brand_image' => 'required'
        ]);

        $oldImage = $request->old_image;
        if ($request->hasFile('brand_image')) {
            @unlink('upload/brand/' . $oldImage);
            $image = $request->file('brand_image');
            $getFileName = uniqid() . '_' . date('m_Y') . '_' . $image->getClientOriginalName();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $getFileName);
            $saveImage = $getFileName;
        }

        $params = [
            'brand_name_vi' => $request->brand_name_vi,
            'brand_name_en' => $request->brand_name_en,
            'brand_slug_vi' => strtolower(str_replace(' ', '-', $request->brand_name_vi)),
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_image' => $saveImage,
        ];

        Brand::findOrFail($id)->update($params);
        $notification = array(
            'message' => 'Update Brand Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('brand.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $image = $brand->brand_image;
        if ($image != '') {
            @unlink('upload/brand/' . $image);
        }
        $brand->delete();

        $notification = array(
            'message' => 'Delete Brand Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('brand.index')->with($notification);
    }
}
