<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'category_id',
        'sub_category_id',
        'product_name_en',
        'product_name_vi',
        'product_slug_en',
        'product_slug_vi',
        'product_code',
        'product_qty',
        'product_tag_en',
        'product_tag_vi',
        'product_size_en',
        'product_size_vi',
        'product_color_en',
        'product_color_vi',
        'selling_price',
        'discount_price',
        'short_desciption_en',
        'short_desciption_vi',
        'long_desciption_en',
        'long_desciption_vi',
        'product_thambnail',
        'hot_deals',
        'featured',
        'special_offer',
        'special_deals',
        'status',
    ];


}
