<?php

namespace Illusive\Blog\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Author extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
        $this->addMediaConversion('cropped')
            ->width(175)
            ->height(175);
    }

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
        return Attribute::get(fn () => asset(Storage::url($this->photo)));
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'blog_author_id');
    }
}
