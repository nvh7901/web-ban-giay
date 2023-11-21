<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->product_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color_en,
                    'size' => $request->size_en,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {
            $discount = (100 - $product->discount_price) / 100;
            $sellingPrice = $product->product_price * $discount;
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $sellingPrice,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color_en,
                    'size' => $request->size_en,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }

    public function addMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

    public function removeMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json([
            'success' => 'Remove Product from cart successfully',
        ]);
    }

    public function myCart()
    {
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('frontend.cart.my_cart', compact('categories'));
    }

    public function getMyCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

    public function removeCart($id)
    {
        Cart::remove($id);
        return response()->json([
            'success' => 'Remove Cart Successfully',
        ]);
    }

    public function cartIncrement($id)
    {
        $row = Cart::get($id);
        Cart::update($id, $row->qty + 1);
        return response()->json([
            'success' => 'Increment Product Successfully',
        ]);
    }

    public function cartDecrement($id)
    {
        $row = Cart::get($id);
        Cart::update($id, $row->qty - 1);
        return response()->json([
            'success' => 'Decrement Product Successfully',
        ]);
    }
}
