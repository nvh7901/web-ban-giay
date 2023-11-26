<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function ward()
    {
        return $this->hasMany(Ward::class, 'id', 'ward_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
