<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table ='blogs';
    protected $primaryKey = 'id';
    protected $fillable = [
            'title',
            'content',
           'user_id',
     
        ];
        public function comments()
        {
            return $this->hasMany(Comment::class);
        }    
        public function user()
{
    return $this->belongsTo(User::class);
}
}
