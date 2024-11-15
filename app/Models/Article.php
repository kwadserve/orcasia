<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable = ['author_id','title', 'subtitle', 'slug', 'title_image', 'half_image', 'content_image', 'image_caption', 'keywords',
                            'introduction', 'content', 'tags', 'category', 'status', 'views', 'created_at'];
}
