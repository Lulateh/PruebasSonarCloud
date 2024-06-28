<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blog_posts_id',
        'content'
    ];
     public function post()
    {
        return $this->belongsTo(Blog_post::class, 'blog_posts_id');
    }
}
