<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    public $timestamps = false;
    protected $fillable = [
        'parent_id',
        'user_post_id',
        'description',
        'title',
        'meta_title',
        'slug',
        'content',
        'active',
        'created_at',
        'updated_at'
    ];
    public function getPostCategory(){
        return ($this->hasOne(PostCategory::class, 'post_id', 'id'));
    }
    public function getPostTag(){
        return ($this->hasOne(PostTag::class, 'post_id', 'id'));
    }
    public function getPostMeta(){
        return ($this->hasOne(PostMeta::class, 'post_id', 'id'));
    }
}
