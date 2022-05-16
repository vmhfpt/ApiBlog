<?php

namespace App\Http\Service\PostService;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostMeta;
use App\Models\PostTag;
use Illuminate\Support\Str;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostDetailResource;
use App\Http\Resources\DetailPostCollection;
class  PostService
{
    public function getDetailCategoryApi($slug){

        return new CategoryResource(Category::where('slug', $slug)->first());
    }
    public function getDetailApi($slug){
       // return new DetailPostCollection(Post::where('slug', $slug)->first());
       return new DetailPostCollection([], $slug);
    }
    public function showMoreApi (){
        return CategoryResource::collection(Category::where('id', '!=' , 4)->get());
    }
    public function getAllApi(){
        $dataItem = Post::all();
        return response()->json($dataItem);
    }

    public function getWhere($slug)
    {
        return (Post::where('slug', $slug)->firstOrFail());
    }
    public function getPostAll()
    {
        return (Post::all());
    }
    public function CheckFile($file)
    {

        $Error = array();
        $validTypes = array('webp', 'jpg', 'jpeg', 'png', 'bmp');
        foreach ($file as $key => $value) {
            $nameFile = $file[$key]->getClientOriginalName(); // Tên file
            $nameType = $file[$key]->extension(); // Đuôi file
            $Filebytes = $file[$key]->getSize(); // Kích thước File
            if (!in_array($nameType, $validTypes)) {
                $Error[] = "* File '$nameFile' không đúng với định dạng hình ảnh";
            }
            if ($Filebytes > (8 * 1024 * 1024)) {
                $Error[] = "* File '$nameFile' vượt quá dung lượng cho phép";
            }
        }
        return ($Error);
    }
    public function getCategoryAll()
    {
        return (Category::all());
    }
    public function getTagAll()
    {
        return (Tag::all());
    }
    public function insert($request)
    {

        $userPostId =  Auth::id();
        $insertPost = new Post();
        $insertPost->user_post_id = $userPostId;
        $insertPost->parent_id = $request->input('parent_id');
        $insertPost->title = $request->input('name');
        $insertPost->meta_title = $request->input('name');
        $insertPost->slug = Str::of($request->input('name'))->slug('-');
        $insertPost->description = $request->input('description');
        $insertPost->content = $request->input('content');
        $active = 0;
        if ($request->has('active')) {
            $active = 1;
        }
        $insertPost->active = $active;
        $insertPost->created_at = date('Y-m-d H:i:s');
        $insertPost->updated_at = date('Y-m-d H:i:s');
        if ($request->hasFile('thumb')) {
            $file = $request->thumb;
            $typeLastFile =  $request->thumb[0]->extension();
            $nameFile = md5(uniqid()) . '.' . $typeLastFile;
            $upload = $file[0]->storeAs('public/products/', $nameFile);
            $insertPost->thumb = "storage/products/" . $nameFile;
        }
        $insertPost->save();
        $postId = $insertPost->id;
        $insertCategory = new PostCategory();
        $insertCategory->post_id = $postId;
        $insertCategory->category_id = $request->input('category_id');
        $insertCategory->save();


        $inserrPostMeta = new PostMeta();
        $inserrPostMeta->post_id = $postId;
        $inserrPostMeta->key = $request->input('key_seo');
        $inserrPostMeta->content = 'null';
        $inserrPostMeta->created_at = date('Y-m-d H:i:s');
        $inserrPostMeta->updated_at = date('Y-m-d H:i:s');
        $inserrPostMeta->save();

        $insertPostTag = new PostTag();
        $insertPostTag->post_id = $postId;
        $insertPostTag->tag_id = $request->input('tag_id');
        $insertPostTag->save();
        return (redirect()->back()->with('success', 'Thêm bài viết ' . $request->input('name') . ' thành công !'));
    }
    public function update($request, $slug)
    {

        $userPostId =  Auth::id();
        $updatePost = Post::where('slug', $slug)->firstOrFail();
        if ($request->hasFile('thumb')) {
            unlink($updatePost->thumb);
            $file = $request->thumb;
            $typeLastFile =  $request->thumb[0]->extension();
            $nameFile = md5(uniqid()) . '.' . $typeLastFile;
            $upload = $file[0]->storeAs('public/products/', $nameFile);
            $updatePost->thumb = "storage/products/" . $nameFile;
        }
        $updatePost->user_post_id = $userPostId;
        $updatePost->parent_id = $request->input('parent_id');
        $updatePost->title = $request->input('name');
        $updatePost->meta_title = $request->input('name');
        $updatePost->slug = Str::of($request->input('name'))->slug('-');
        $updatePost->description = $request->input('description');
        $updatePost->content = $request->input('content');
        $active = 0;
        if ($request->has('active')) {
            $active = 1;
        }
        $updatePost->active = $active;
        $updatePost->updated_at = date('Y-m-d H:i:s');
        $updatePost->save();


        $updateCategory =  PostCategory::where('post_id', $updatePost->id)->first();
        $updateCategory->category_id = $request->input('category_id');
        $updateCategory->save();

        $updatePostTag = PostTag::where('post_id',  $updatePost->id)->first();
        $updatePostTag->tag_id = $request->input('tag_id');
        $updatePostTag->save();

        $updatePostMeta = PostMeta::where('post_id', $updatePost->id)->first();
        $updatePostMeta->key = $request->input('key_seo');
        $updatePostMeta->updated_at = date('Y-m-d H:i:s');
        $updatePostMeta->save();
        return (redirect('/admin/post/edit/' . Str::of($request->input('name'))->slug('-'))->with('success', '* Cập nhật bài đăng thành công !'));
    }
    public function destroy($request)
    {
        $dataImage = Post::find($request->id);
        unlink($dataImage->thumb);
        $dataImage->delete();
        PostCategory::where('post_id', $request->input('id'))->delete();
        PostTag::where('post_id',  $request->input('id'))->delete();
        PostMeta::where('post_id',  $request->input('id'))->delete();
        return (true);
    }
}
