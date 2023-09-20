<?php

namespace Stephenjude\FilamentBlog\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Stephenjude\FilamentBlog\Models\Category
 *
 * @property string $name
 * @property string $slug
 * @property ?string $description
 * @property bool $is_visible
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereIsVisible($value)
 */
class Category extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'blog_categories';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_visible',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'blog_category_id', 'id');
    }

    /**
     * @param  Builder<Category>  $query
     * @return Builder<Category>
     */
    public function scopeIsVisible(Builder $query)
    {
        return $query->whereIsVisible(true);
    }

    /**
     * @param  Builder<Category>  $query
     * @return Builder<Category>
     */
    public function scopeIsInvisible(Builder $query)
    {
        return $query->whereIsVisible(false);
    }
}
