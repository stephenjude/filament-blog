<?php

namespace Stephenjude\FilamentBlog\Models\Concerns;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Stephenjude\FilamentBlog\Models\Post;

trait HasBlogPosts
{
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'blog_author_id');
    }
}
