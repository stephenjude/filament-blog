<?php

namespace Stephenjude\FilamentBlog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Stephenjude\FilamentBlog\FilamentBlog
 */
class FilamentBlog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-blog';
    }
}
