<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tag';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'meta_title',
        'slug',
        'content',
        'created_at',
        'updated_at'
    ];
    public function getPostTag(){
        return ($this->hasMany(PostTag::class, 'tag_id', 'id'));
    }
}
