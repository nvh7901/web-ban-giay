<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'brand_name_vi',
        'brand_name_en',
        'brand_slug_vi',
        'brand_slug_en',
        'brand_image'
    ];
}
