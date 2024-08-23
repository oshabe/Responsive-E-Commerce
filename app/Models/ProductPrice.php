<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product',
        'current_price',
        'expired_price',
        'status',
        'created_by',
        'updated_by'
    ];
}
