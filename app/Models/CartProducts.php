<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_data',
        'product',
        'user',
        'status',
        'created_by',
        'updated_by'
    ];
}
