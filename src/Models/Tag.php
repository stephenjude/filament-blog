<?php

namespace Illusive\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends \Spatie\Tags\Tag
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'blog_tags';
}
