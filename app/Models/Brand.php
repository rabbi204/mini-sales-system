<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [
        'barnd_name_en',
        'barnd_name_bn',
        'brand_slug_en',
        'brand_slug_bn',
        'brand_image',
    ];
}
