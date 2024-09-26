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
        'restaurant_id', // This links the franchise to a restaurant
        'image_data',
        'city',
        'state',
        'zip_code',
        'status'
    ];

    /**
     * Get the restaurant that owns the franchise.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurent::class, 'restaurant_id');
    }

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
