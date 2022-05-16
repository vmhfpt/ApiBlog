<?php

namespace App\Http\Service\TagService;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Http\Resources\PostResource;
class  TagService
{
    public function getDetailTagApi($slug){
       //  dd(Tag::where('slug', $slug)->first()->getPostTag()->first()->getPost);
         return [
             'data' => Tag::where('slug', $slug)->first(),
            'get_post' => PostResource::collection(Tag::where('slug', $slug)->first()->getPostTag),
         //    'post' =>

         ];
    }
    public function whereSlug($slug){
        return (Tag::where('slug', $slug)->firstOrFail());
    }
    public function insert($request){
         $insert = new Tag();

        $insert->title = $request->input('name');
        $insert->meta_title =  $request->input('name');
        $insert->slug = Str::of($request->input('name'))->slug('-');
        $insert->content = 'null';
        $insert->created_at = date('Y-m-d H:i:s');
        $insert->updated_at = date('Y-m-d H:i:s');
        $insert->save();
        return redirect()->back()->with('success', 'Tag "'. $request->input('name').'" thành công !');
    }
   public function getAll(){
       return (Tag::all());
   }
   public function update($request, $slug){
       $update = Tag::where('slug', $slug)->firstOrFail();
       $update->title = $request->input('name');
       $update->meta_title = $request->input('name');
       $update->slug = Str::of($request->input('name'))->slug('-');
       $update->content = 'null';
       $update->updated_at = date('Y-m-d H:i:s');
       $update->save();
       return (redirect('/admin/tag/edit/'. Str::of($request->input('name'))->slug('-'))->with('success', 'Cập nhật  Thành công!'));

   }
   public function destroy($request){
       return (Tag::destroy($request->input('id')));
   }
}
