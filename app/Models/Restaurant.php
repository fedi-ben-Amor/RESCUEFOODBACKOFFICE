<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    
use HasFactory;

    // Fillable attributes
    protected $fillable = [
        'name',
        'phone',
        'cuisine_type',
        'description',
        'logo'  ,
        'picture',
        'status' 


    ];
    // Casts
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}