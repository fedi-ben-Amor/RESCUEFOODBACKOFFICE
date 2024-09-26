<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $fillable = [
        'restaurent_id',
        'comment',
        'date',
        'rating',

    ];

    /**
     * Get the restaurant that owns the review.
     */
    public function restaurent()
    {
        return $this->belongsTo(Restaurent::class, 'restaurent_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
