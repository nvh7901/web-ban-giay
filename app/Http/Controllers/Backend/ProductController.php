<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::latest()->paginate(7);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataBrands = Brand::orderBy('id', 'DESC')->get();
        $dataCategories = Category::orderBy('id', 'DESC')->get();
        $dataSubCategories = SubCategory::orderBy('id', 'DESC')->get();
        return view('admin.product.create', compact('dataBrands', 'dataCategories', 'dataSubCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'product_name_vi' => 'required',
            'product_name_en' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_thambnail' => 'required|max:2048|mimes:jpeg,png,jpg,zip,pdf',
        ]);

        // Upload product thumbnail
        if ($request->hasFile('product_thambnail')) {
            $image = $request->file('product_thambnail');
            $getFileName = uniqid() . '_' . date('m_Y') . '_' . $image->getClientOriginalName();
            Image::make($image)->resize(900, 900)->save('upload/products/' . $getFileName);
            $saveImage = $getFileName;
        }

        $params = [
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'product_name_en' => $request->product_name_en,
            'product_name_vi' => $request->product_name_vi,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_vi' => strtolower(str_replace(' ', '-', $request->product_name_vi)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tag_en' => $request->product_tag_en,
            'product_tag_vi' => $request->product_tag_vi,
            'product_size_en' => $request->product_size_en,
            'product_size_vi' => $request->product_size_vi,
            'product_color_en' => $request->product_color_en,
            'product_color_vi' => $request->product_color_vi,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desciption_en' => $request->short_desciption_en,
            'short_desciption_vi' => $request->short_desciption_vi,
            'long_desciption_en' => $request->long_desciption_en,
            'long_desciption_vi' => $request->long_desciption_vi,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $saveImage,
            'status' => 1,
            'created_at' => Carbon::now(),
        ];
        // dd($params);
        Product::insert($params);

        $notification = array(
            'message' => 'Create Product Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('product.index')->with($notification);
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
        $dataBrands = Brand::orderBy('id', 'DESC')->get();
        $dataCategories = Category::orderBy('id', 'DESC')->get();
        $dataSubCategories = SubCategory::orderBy('id', 'DESC')->get();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('dataBrands', 'dataCategories', 'dataSubCategories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'product_name_vi' => 'required',
            'product_name_en' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
        ]);

        $params = [
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'product_name_en' => $request->product_name_en,
            'product_name_vi' => $request->product_name_vi,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_vi' => strtolower(str_replace(' ', '-', $request->product_name_vi)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tag_en' => $request->product_tag_en,
            'product_tag_vi' => $request->product_tag_vi,
            'product_size_en' => $request->product_size_en,
            'product_size_vi' => $request->product_size_vi,
            'product_color_en' => $request->product_color_en,
            'product_color_vi' => $request->product_color_vi,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desciption_en' => $request->short_desciption_en,
            'short_desciption_vi' => $request->short_desciption_vi,
            'long_desciption_en' => $request->long_desciption_en,
            'long_desciption_vi' => $request->long_desciption_vi,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
        ];

        $oldImage = $request->old_image;
        if ($request->hasFile('product_thambnail')) {
            @unlink('upload/products/' . $oldImage);
            $image = $request->file('product_thambnail');
            $getFileName = uniqid() . '_' . date('m_Y') . '_' . $image->getClientOriginalName();
            Image::make($image)->resize(300, 300)->save('upload/proucts/' . $getFileName);
            $params['product_thambnail'] = $getFileName;
        }
        Product::findOrFail($id)->update($params);

        $notification = array(
            'message' => 'Update Product Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $image = $product->product_thambnail;
        if ($image != '') {
            @unlink('upload/proucts/' . $image);
        }
        $product->delete();

        $notification = array(
            'message' => 'Delete Product Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('product.index')->with($notification);
    }

    public function inactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        
        $notification = array(
            'message' => 'Inactive Product Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('product.index')->with($notification);
    }

    public function active($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Active Product Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('product.index')->with($notification);
    }
}
