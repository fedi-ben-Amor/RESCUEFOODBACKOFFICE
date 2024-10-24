<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurent extends Model
{
    use HasFactory;

    protected $table = 'restaurents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'phone',
        'cuisine_type',
        'description',
        'logo',
        'picture',
        'status' ,
        'address',
        'city',
        'state',
        'status',
        'user_id' 
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the reviews for the restaurant.
     */
    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'restaurent_id');
    }

    /**
     * Get the franchises for the restaurant.
     */
    public function franchises()
    {
        return $this->hasMany(Franchise::class, 'restaurant_id');
    }
}
