<?php

namespace Stephenjude\FilamentBlog\Tests\Models;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Stephenjude\FilamentBlog\Tests\Database\Factories\UserFactory;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function canAccessFilament(): bool
    {
        return true;
    }

    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
