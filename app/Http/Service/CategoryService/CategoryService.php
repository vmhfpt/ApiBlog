<?php

namespace App\Http\Service\CategoryService;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Resources\CategoryResource;
class  CategoryService
{
    public function getAllApi(){
        $dataItem = Category::all();
        return response()->json($dataItem);
    }
    public function where($slug){
        return (Category::where('slug', $slug)->firstOrFail());
    }
    public function getAll(){
        return (Category::all());
    }
    public function insert($request){
        $name = $request->input('name');
        $parent_id = $request->input('parent_id');
        $slug =  Str::of($name)->slug('-');
        $active = 0;
        if($request->has('active')){
            $active = 1;
        }
        $insert = new Category();
        $insert->title = $name;
        $insert->parent_id = $parent_id;
        $insert->meta_title = $name;
        $insert->slug = $slug;
        $insert->content = '';
        $insert->active = $active;
        $insert->updated_at = date('Y-m-d H:i:s');
        $insert->created_at = date('Y-m-d H:i:s');
        $insert->save();
        return redirect()->back()->with('success', 'Thêm danh mục "'.$name.'" thành công !');
    }
    public function update($request, $slug){
        $update = Category::where('slug', $slug)->firstOrFail();
        $active = 0;
        if($request->has('active')){
            $active = 1;
        }
         $update->title = $request->input('name');
         $update->parent_id = $request->input('parent_id');
         $update->meta_title = $request->input('name');
         $update->slug = Str::of($request->input('name'))->slug('-');
         $update->content = '';
         $update->active = $active;
         $update->updated_at = date('Y-m-d H:i:s');
         $update->save();
       //  return redirect('/admin/category/edit/'.Str::of($request->input('name'))->slug('-').'')->with('success', 'Cập nhật danh mục "'. $request->input('name').'" thành công !');
       return (redirect('/admin/category/edit/'. Str::of($request->input('name'))->slug('-'))->with('success', 'Cập nhật danh mục Thành công!'));
    }
    public function deleteItem($request){
        return (Category::destroy($request->input('id')));
    }
}
