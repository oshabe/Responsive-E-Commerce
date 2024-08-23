<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip_address',
        'user_agent',
        'user',
        'status',
        'created_by',
        'updated_by'
    ];
}
