<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['user_id', 'post_id', 'body', 'parent_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi untuk balasan komentar
    public function replies()
    {
        return $this->hasMany(Comments::class, 'parent_id');
    }

    // Relasi untuk komentar induk (parent)
    public function parent()
    {
        return $this->belongsTo(Comments::class, 'parent_id');
    }
}
