<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostDetailResource;
use App\Http\Resources\CategoryPosstResource;
use App\Http\Resources\TagResource;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
class DetailPostCollection extends ResourceCollection
{
    protected $slug;
    public function __construct($data,$slug)
    {
        $this->slug = $slug;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return CategoryResource::collection(Category::where('id', '!=' , 4)->get());
        return [
            'data' =>  new PostDetailResource(Post::where('slug', $this->slug)->first()),
            'category' => CategoryPosstResource::collection(Category::all()),
            'tag' => Tag::all()->toArray(),
        ];
    }
}
