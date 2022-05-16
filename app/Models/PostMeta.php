<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    use HasFactory;
    protected $table = 'post_meta';
    public $timestamps = false;
    protected $fillable = [
        'post_id',
        'key',
        'content',
        'created_at',
        'updated_at'
    ];
}
