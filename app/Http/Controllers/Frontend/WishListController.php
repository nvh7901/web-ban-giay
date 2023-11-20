<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\WishList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function addWistList(Request $request, $id)
    {
        if (Auth::check()) {
            $isWishList = WishList::where('user_id', Auth::id())->where('product_id', $id)->first();
            if (!$isWishList) {
                WishList::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $id,
                    'created_at' => Carbon::now(),
                ]);

                return response()->json([
                    'success' => 'Add Product Wist List Successfully',
                ]);
            } else {
                return response()->json([
                    'error' => 'This product has been wish list',
                ]);
            }
        }
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('frontend.wishlist.index', compact('categories'));
    }

    public function getWishList()
    {
        $wishLists = WishList::with('product')->where('user_id', Auth::id())->latest()->get();
        return response()->json($wishLists);
    }

    public function removetWishList($id)
    {
        WishList::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json([
            'success' => 'Remove Wish List Successfully',
        ]);
    }
}
