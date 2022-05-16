<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\CommentService\CommentService;
class CommentController extends Controller
{
    protected $commentService;
    //
    public function __construct()
    {
      $this->commentService = new CommentService();
    }
    public function show(Request $request){
       $slug = $request->params;
       return ($this->commentService->getCommentApi($slug['slug']));
    }
    public function postComment(Request $request){
          $data = $request->params;
          return ($this->commentService->postComment($data));
    }
}
