<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'price',
        'discount_price',
        'size',
        'weight',
        'image',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
}
