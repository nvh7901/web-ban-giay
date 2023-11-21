<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_name',
    ];

    public function district()
    {
        return $this->hasMany(District::class, 'id', 'province_id');
    }

    public function ward()
    {
        return $this->hasMany(Ward::class, 'id', 'ward_id');
    }
}
