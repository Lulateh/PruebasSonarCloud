<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'content'
    ];
    public function comments()
    {
        return $this->hasMany(Blog_comment::class, 'blog_posts_id');
    }

}
