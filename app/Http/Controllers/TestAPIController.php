<?php

namespace App\Http\Controllers;

use App\models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Models\User;

class TestAPIController extends Controller
{
    //return CategoryResource::collection(Category::all());
    //  return UserResource::collection(User::all());
    //
    public function index()
    {
        //taoladanchoi123
        echo 'cc';
        $data = Category::all();
        dd($data);
      //  return CategoryResource::collection(Category::all());
        /*    $dataItem = Category::all();
        foreach($dataItem as $value){
           foreach($value->getPostCategory as $dd){
                echo $dd->getPost->title;
           }

        }*/
    }
    /*  $user = Post::with('getPostTag.getTag:id', 'getPostCategory.getCategory:id')->get();
        return $user->toArray();*/

    // return UserResource::collection(Post::all());
    // return new UserCollection(Post::paginate(2));
    //  }

}
