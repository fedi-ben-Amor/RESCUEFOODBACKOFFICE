<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'manager_name',
        'contact_number',
        'email',
        'restaurant_id',
        'image_data'

    ];

    // Relationship to stocks
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    // Casts
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
