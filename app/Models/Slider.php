<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'slider_image',
        'slider_title_vi',
        'slider_title_en',
        'slider_description_vi',
        'slider_description_en',
        'status',
    ];
}
