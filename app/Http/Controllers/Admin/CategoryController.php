<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\CategoryService\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataItem = $this->categoryService->getAll();

        $title = 'Danh sách danh mục ';
        return (view('admin.category.list', compact('dataItem','title')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $dataItem =  $this->categoryService->getAll();
        $title = 'Thêm danh mục mới';

        return (view('admin.category.add', compact('title', 'dataItem')));
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
            'name' => 'required',
        ], [
            'name.required' => '* Tên danh mục không được để trống !'
        ]);
        return ($this->categoryService->insert($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $listCategory = $this->categoryService->getAll();
         $dataItem = $this->categoryService->where($slug);
         $title = "Chỉnh sửa danh mục ". $dataItem->title;
        return (view('admin.category.edit', compact('title', 'dataItem', 'listCategory')));
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
            'name.required' => '* Tên danh mục không được để trống !'
        ]);
        return ($this->categoryService->update($request, $slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
       return ($this->categoryService->deleteItem($request));
    }
}
