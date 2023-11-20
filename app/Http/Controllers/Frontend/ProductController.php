<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function productDetail($id, $slug)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('id', 'ASC')->get();
        $hotDeals = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(5)->get();
        $specialOffer = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(5)->get();
        $pecialDeal = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(5)->get();

        $colorEn = $product->product_color_en;
        $productColorEn = explode(',', $colorEn);

        $colorVi = $product->product_color_vi;
        $productColorVi = explode(',', $colorVi);

        $sizeEn = $product->product_size_en;
        $productSizeEn = explode(',', $sizeEn);

        $sizeVi = $product->product_size_vi;
        $productSizeVi = explode(',', $sizeVi);

        $category_id = $product->category_id;
        $relatedProducts = Product::where('category_id', $category_id)->orderBy('id', 'DESC')->get();

        return view(
            'frontend.product.detail',
            compact('product', 'categories', 'hotDeals', 'specialOffer', 'pecialDeal', 'productColorEn', 'productColorVi', 'productSizeEn', 'productSizeVi', 'relatedProducts')
        );
    }

    public function listCategoryProduct($id, $slug)
    {
        $products = Product::where('status', 1)->where('category_id', $id)->orderBy('id', 'DESC')->paginate(6);
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('frontend.product.category_product', compact('products', 'categories'));
    }

    public function listSubCategoryProduct($id, $slug)
    {
        $products = Product::where('status', 1)->where('sub_category_id', $id)->latest()->paginate(6);
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('frontend.product.sub_category_product', compact('products', 'categories'));
    }

    public function modalViewProduct($id)
    {
        $product = Product::with('category', 'brand')->findOrFail($id);

        $colorEn = $product->product_color_en;
        $productColorEn = explode(',', $colorEn);

        $colorVi = $product->product_color_vi;
        $productColorVi = explode(',', $colorVi);

        $sizeEn = $product->product_size_en;
        $productSizeEn = explode(',', $sizeEn);

        $sizeVi = $product->product_size_vi;
        $productSizeVi = explode(',', $sizeVi);

        return response()->json(array(
            'product' => $product,
            'color_en' => $productColorEn,
            'color_vi' => $productColorVi,
            'size_en' => $productSizeEn,
            'size_vi' => $productSizeVi,
        ));
    }
}
