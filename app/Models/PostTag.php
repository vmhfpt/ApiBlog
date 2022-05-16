<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;
    protected $table = 'post_tag';
    public $timestamps = false;
    protected $fillable = [
        'post_id',
        'tag_id',
    ];
    public function getTag(){
        return ($this->hasOne(Tag::class, 'id', 'tag_id'));
    }
    public function getPost(){
        return ($this->hasMany(Post::class, 'id', 'post_id'));
    }
}
