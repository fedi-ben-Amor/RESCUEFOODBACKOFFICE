<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'city',
        'adresse',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
