<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\PostTag;
use App\Http\Resources\PostResource;
class PostDetailResource extends JsonResource
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
        'user_post_id'=> $this->user_post_id,
        'description' => $this->description,
        'title' => $this->title,
        'meta_title' => $this->meta_title,
        'thumb' => $this->thumb,
        'slug' => $this->slug,
        'content' => $this->content,
        'active' => $this->active,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        'category' => $this->getPostCategory->getCategory,
        'tag' => $this->getPostTag->getTag,
   //     'morePost' => PostTag::where('tag_id', $this->getPostTag->tag_id)->get(),
        'more_post' =>  PostResource::collection(PostTag::where('tag_id', $this->getPostTag->tag_id)->take(4)->get()),
       ];
    }
}
