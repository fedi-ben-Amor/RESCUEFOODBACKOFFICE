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
        'address',
        'city',
        'state'
    ];
}
