<?php

namespace Stephenjude\FilamentBlog\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * Stephenjude\FilamentBlog\Models\Author
 *
 * @property string $name
 * @property ?string $email
 * @property ?string $photo
 * @property ?string $bio
 * @property ?string $github_handle
 * @property ?string $twitter_handle
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Author extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'blog_authors';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'photo',
        'bio',
        'github_handle',
        'twitter_handle',
    ];

    /**
     * @var array<string>
     */
    protected $appends = [
        'photo_url',
    ];

    public function photoUrl(): Attribute
    {
        return Attribute::get(fn () => $this->photo ? asset(Storage::url($this->photo)) : '');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'blog_author_id');
    }
}
