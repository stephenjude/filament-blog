<?php

namespace Stephenjude\FilamentBlog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Stephenjude\FilamentBlog\Blog
 */
class Blog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-blog';
    }
}
