<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SubCategory::latest()->paginate(7);
        return view('admin.sub_category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataCategories = Category::orderBy('id', 'DESC')->get();
        return view('admin.sub_category.create', compact('dataCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|numeric',
            'sub_category_name_vi' => 'required',
            'sub_category_name_en' => 'required',
        ]);

        $params = [
            'category_id' => $request->category_id,
            'sub_category_name_vi' => $request->sub_category_name_vi,
            'sub_category_name_en' => $request->sub_category_name_en,
            'sub_category_slug_vi' => strtolower(str_replace(' ', '-', $request->sub_category_name_vi)),
            'sub_category_slug_en' => strtolower(str_replace(' ', '-', $request->sub_category_name_en)),
        ];
        SubCategory::insert($params);

        $notification = array(
            'message' => 'Create Sub Category Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('sub-category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataCategories = Category::orderBy('id', 'DESC')->get();
        $subCategory = SubCategory::findOrFail($id);
        return view('admin.sub_category.edit', compact('dataCategories', 'subCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|numeric',
            'sub_category_name_vi' => 'required',
            'sub_category_name_en' => 'required',
        ]);

        $params = [
            'category_id' => $request->category_id,
            'sub_category_name_vi' => $request->sub_category_name_vi,
            'sub_category_name_en' => $request->sub_category_name_en,
            'sub_category_slug_vi' => strtolower(str_replace(' ', '-', $request->sub_category_name_vi)),
            'sub_category_slug_en' => strtolower(str_replace(' ', '-', $request->sub_category_name_en)),
        ];
        SubCategory::findOrFail($id)->update($params);

        $notification = array(
            'message' => 'Update Sub Category Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('sub-category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Delete Sub Category Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('sub-category.index')->with($notification);
    }
}
