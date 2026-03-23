<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'cover_image',
        'author_name',
        'organization',
        'published_at',
        'is_published',
        'document_url',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];
}
