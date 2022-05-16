<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\TagService\TagService;
class TagController extends Controller
{
    protected $tagService;
    public function __construct()
    {
        $this->tagService = new TagService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $title = 'Danh sách thẻ Tag';
      $dataItem = $this->tagService->getAll();
      return (view('admin.tag.list', compact('dataItem', 'title')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm thẻ tag mới";
        return (view('admin.tag.add', compact('title')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:tag,title',
        ], [
            'name.required' => '* Tên không được để trống !',
            'name.unique' => '* Tên đã tồn tại !',
        ]);

        return ($this->tagService->insert($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
      $dataItem = $this->tagService->whereSlug($slug);
    $title = "Sửa thẻ tag ". $dataItem->title;
  return (view('admin.tag.edit', compact('title', 'dataItem')));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => '* Tên không được để trống !',
        ]);
   return ($this->tagService->update($request, $slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    return ($this->tagService->destroy($request));
    }
}
