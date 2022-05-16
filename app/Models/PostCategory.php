<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    protected $table = 'post_category';
    public $timestamps = false;
    protected $fillable = [
       'category_id',
       'post_id'
    ];
    public function getCategory(){
        return ($this->hasOne(Category::class, 'id', 'category_id'));
    }
    public function getPost(){
        return ($this->hasOne(Post::class, 'id', 'post_id'));
    }
}
