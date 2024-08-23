<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothVariation extends Model
{
    use HasFactory;
    protected $fillable = [
        'size',
        'product',
        'status',
        'created_by',
        'updated_by'
    ];
}
