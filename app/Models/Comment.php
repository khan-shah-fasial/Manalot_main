<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'parent_id',
        'post_id',
        'user_id',
        'content',
    ];

    // Relationship to the parent comment
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }

    // Relationship to the replies (child comments)
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    // Define the user relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userdetails()
    {
        return $this->hasOne(UserDetails::class, 'user_id', 'user_id');
    }



}
