<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_postingan',
        'id_user',
        'image',
        'title',
        'deskripsi',
        'content',
    ];

public function user()
{
    return $this->belongsTo(User::class, 'id_user');
}
   public function comments()
    {
        return $this->hasMany(Comments::class);
    }


    
}
