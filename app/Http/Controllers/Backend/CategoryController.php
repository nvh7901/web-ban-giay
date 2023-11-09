<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::latest()->paginate(7);
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name_vi' => 'required',
            'category_name_en' => 'required',
        ]);

        $params = [
            'category_name_vi' => $request->category_name_vi,
            'category_name_en' => $request->category_name_en,
            'category_slug_vi' => strtolower(str_replace(' ', '-', $request->category_name_vi)),
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
        ];
        Category::insert($params);
        $notification = array(
            'message' => 'Create Category Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('category.index')->with($notification);
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
        $category = Category::findorFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name_vi' => 'required',
            'category_name_en' => 'required',
        ]);

        $params = [
            'category_name_vi' => $request->category_name_vi,
            'category_name_en' => $request->category_name_en,
            'category_slug_vi' => strtolower(str_replace(' ', '-', $request->category_name_vi)),
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
        ];
        Category::findOrFail($id)->update($params);

        $notification = array(
            'message' => 'Update Category Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $category = Category::findorFail($id);
        $category->delete();

        $notification = array(
            'message' => 'Delete Category Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('category.index')->with($notification);
    }
}
