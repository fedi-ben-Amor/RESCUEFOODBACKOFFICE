<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Comment;
use App\Models\Review;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'adresse',
        'picture',
        'tel_mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function restaurent()
    {
        return $this->hasOne(Restaurent::class, 'user_id');
    }
    
}
