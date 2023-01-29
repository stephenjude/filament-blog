<?php

namespace Illusive\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illusive\Blog\Models\Post;
use Illusive\Blog\Models\Tag;
use Illusive\Blog\Resources\PostApiResource;
use Inertia\Inertia;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show(string $tag)
    {
        $tag = Tag::findFromString($tag);

//        $posts = Post::withAnyTags([$tag])->get();
        $posts = Post::query()
            ->whereHas('tags', function (Builder $query) use ($tag) {
                $query->where('blog_tags.id', $tag->id);
            })
            ->paginate(9);

        $posts = PostApiResource::collection($posts);

        return Inertia::render('Post/Index', compact('posts', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected static function convertToTags($values, $type = null, $locale = null)
    {
        if ($values instanceof \Spatie\Tags\Tag) {
            $values = [$values];
        }

        return collect($values)->map(function ($value) use ($type, $locale) {
            if ($value instanceof Tag) {
                if (isset($type) && $value->type != $type) {
                    throw new InvalidArgumentException("Type was set to {$type} but tag is of type {$value->type}");
                }

                return $value;
            }

            $className = config('tags.tag_model', \Spatie\Tags\Tag::class);
            dd($className);

            return $className::findFromString($value, $type, $locale);
        });
    }
}
