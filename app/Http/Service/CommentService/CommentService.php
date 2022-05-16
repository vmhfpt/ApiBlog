<?php

namespace App\Http\Service\CommentService;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Resources\CategoryResource;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
class  CommentService
{
   public function getCommentApi($slug){


      $dataItem = Post::where('slug', $slug)->first();
       if(!is_null($dataItem)){
           $idPost = $dataItem->id;
           return CommentResource::collection(Comment::where(['post_id' => $idPost, 'parent_id' => 0])->orderBy('id', 'desc')->get());
       } else {
           return [
               'data' => 'No result find for this slug '
           ];
       }
   }
   public function postComment($data){
       $parent_id = $data['parent_id'];
        $slug = $data['slug'];
        $name = $data['name'];
        $phoneNumber = $data['number'];
        $email = $data['email'];
        $content = $data['content'];
        $idPost = Post::where('slug', $slug)->first()->id;
        $insert = new Comment();
        $insert->post_id = $idPost;
        $insert->parent_id = $parent_id;
        $insert->phone_number = $phoneNumber;
        $insert->name = $name;
        $insert->email = $email;
        $insert->content = $content;
        $insert->active = 1;
        $insert->created_at = date('Y-m-d H:i:s');
        $insert->updated_at = date('Y-m-d H:i:s');
        $insert->save();
         return [
             'status' => 'success',
         ];
   }
}
