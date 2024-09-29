<?php

namespace App\Models;
use App\Models\User;
use App\Models\Restaurent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
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
        return $this->belongsTo(Restaurent::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
