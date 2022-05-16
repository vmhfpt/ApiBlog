<?php

namespace App\Http\Service\FooterService;
use App\Models\Footer;
use Illuminate\Support\Str;
class  FooterService
{
    public function getAllApi(){
        $dataItem = Footer::all();
        return (response()->json($dataItem));
    }
    public function getDetailApi($slug){
        $dataItem = Footer::where('slug', $slug)->firstOrFail();
        return (response()->json($dataItem));
    }
  public function insert($request){

      $name = $request->input('name');
      $content = $request->input('content');
      $slug =  Str::of($request->input('name'))->slug('-');
      $insert = new Footer();
      $insert->title = $name;
      $insert->meta_title = $name;
      $insert->slug = $slug;
      $insert->content = $content;
      $insert->created_at = date('Y-m-d H:i:s');
      $insert->updated_at =  date('Y-m-d H:i:s');
      $insert->save();
      return (redirect()->back()->with('success', 'Thêm chân trang ' . $request->input('name') . ' thành công !'));
  }
  public function index(){
      $title = ' Danh sách chân trang ';
      $dataItem = Footer::all();
      return (view('admin.footer.list', compact('title', 'dataItem')));
  }
  public function delete($request){
      $id = $request->input('id') ;
      return (Footer::destroy($id));
  }
  public function show($slug){
      $dataItem = Footer::where('slug', $slug)->firstOrFail();
      $title = 'Sửa chân trang' . $dataItem->title;
      return (view('admin.footer.edit', compact('title', 'dataItem')));
  }
  public function update($slug, $request){
      $update = Footer::where('slug', $slug)->firstOrFail();
      $update->title = $request->input('name');
      $update->content = $request->input('content');
      $update->slug = Str::of($request->input('name'))->slug('-');
      $update->updated_at = date('Y-m-d H:i:s');
      $update->save();
      return (redirect('/admin/footer/edit/' . Str::of($request->input('name'))->slug('-'))->with('success', '* Cập nhật footer thành công !'));
  }
}
