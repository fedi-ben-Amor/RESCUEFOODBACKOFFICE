<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'blog_id',
        'content',
        'user_id',
    ];
    public function blog()
{
    return $this->belongsTo(Blog::class);
}
public function user()
    {
        return $this->belongsTo(User::class);
    }
}
