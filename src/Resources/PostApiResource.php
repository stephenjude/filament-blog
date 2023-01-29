<?php

namespace Illusive\Blog\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class PostApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $converter = new GithubFlavoredMarkdownConverter();
        $content = $converter->convert($this->content);

        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'category' => $this->category->name,
            'thumb' => $this->getFirstMediaUrl('banner', 'thumb'),
            'image' => $this->getFirstMediaUrl('banner', 'cropped'),
            'title' => $this->title,
            'description' => $this->excerpt,
            'content' => $content->getContent(),
            'reading_time' => $this->site_estimated_reading_time($this->content),
            'date' => $this->created_at->format('M d, Y'),
            'tags' => TagApiResource::collection($this->tags),
            'author' => [
                'name' => $this->author->name,
                'image' => $this->author->getFirstMediaUrl('avatar', 'thumb'),
                'cropped' => $this->author->getFirstMediaUrl('avatar', 'main'),
                'bio' => $this->author->bio,
            ],
        ];
//        return parent::toArray($request);
    }

    public function site_estimated_reading_time($content = '', $wpm = 250)
    {
        $word_count = str_word_count($content);

        return ceil($word_count / $wpm);
    }
}
