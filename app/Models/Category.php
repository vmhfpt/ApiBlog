<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = [
        'parent_id',
        'title',
        'meta_title',
        'slug',
        'content',
        'active',
        'created_at',
        'updated_at'
    ];
    public function getParent(){
        return ($this->hasOne(Category::class, 'id', 'parent_id'));
    }
    public function getPostCategory(){
        return ($this->hasMany(PostCategory::class, 'category_id', 'id'));
    }

}
