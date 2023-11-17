<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name_vi',
        'category_name_en',
        'category_slug_vi',
        'category_slug_en'
    ];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'id', 'category_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'category_id');
    }
}
