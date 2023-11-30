<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $product = $request->product_id;

        $request->validate([
            'summary' => 'required',
    		'comment' => 'required',
        ]);

        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'rating' => $request->quality,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Review Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
