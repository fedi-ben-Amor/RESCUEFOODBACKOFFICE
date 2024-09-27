<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // Fillable attributes
    protected $fillable = [
        'franchise_id',
        'food_id',
        'quantity',
        'expiration_date',
        'image_data',  // Add this line to allow mass assignment of the image data
    ];

    // Relationship to Franchise
    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }

    // Relationship to Food
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    // Casts
    protected $casts = [
        'expiration_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
