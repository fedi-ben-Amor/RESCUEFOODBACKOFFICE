<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // Table name (optional, only needed if not using default 'stocks')
    // protected $table = 'stocks';

    // Fillable attributes
    protected $fillable = [
        'franchise_id',
        'food_id',
        'quantity',
        'expiration_date',
    ];

    // Relationship to Franchise
    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }

    // Casts
    protected $casts = [
        'expiration_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
