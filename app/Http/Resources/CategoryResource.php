<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PostResource;
class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        'parent_id' => $this->parent_id,
        'title'=>$this->title,
        'meta_title' => $this->meta_title,
        'slug' => $this->slug,
        'content'=> $this->content,
        'active' => $this->active,
        'getpost' => PostResource::collection($this->getPostCategory),
        ];
    }
}
