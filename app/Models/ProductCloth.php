<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCloth extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'description',
        'category',
        'material',
        'color',
        'sleeve_type',
        'style',
        'gender',
        'production_country',
        'weight',
        'image',
        'status',
        'created_by',
        'updated_by'
    ];
}
