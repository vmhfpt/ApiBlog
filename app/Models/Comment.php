<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'post_comment';
    public $timestamps = false;
    protected $fillable = [
        'parent_id',
        'post_id',
        'phone_number',
        'name',
        'email',
        'content',
        'active',
        'created_at',
        'updated_at'
    ];
    public function getCommentChild(){
        return ($this->hasMany(Comment::class, 'parent_id', 'id'));
    }
}
