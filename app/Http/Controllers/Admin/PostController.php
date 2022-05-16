<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\PostService\PostService;

class PostController extends Controller
{
    protected $postService;
    public function __construct()
    {
        $this->postService = new PostService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title  = 'Danh sách bài đăng';
        $dataItem = $this->postService->getPostAll();
        return(view('admin.post.list', compact('title', 'dataItem')));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm bài đăng mới';
        $dataCategory = $this->postService->getCategoryAll();
        $dataTag = $this->postService->getTagAll();
        return (view('admin.post.add', compact('title', 'dataCategory', 'dataTag')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|unique:post,title',
            'key_seo' => 'required',
            'description' => 'required',
            'content' => 'required',
            'thumb' => 'required',
        ], [
            'name.required' => '* Tên bài đăng không được để trống !',
            'name.unique' => '* Tên bài đăng đã tồn tại !',
            'key_seo.required' => '* Từ khóa Seo không được để trống !',
            'description.required' => '* Mô tả bài viết không được để trống !',
            'content.required' => '* Nội dung bài viết không được để trống !',
            'thumb.required' => '* Cần ít nhất một ảnh cho bài đăng !',
        ]);



        $file = $request->thumb;

        $errorFile = $this->postService->CheckFile($file);
        if (count($errorFile)  != 0) {
            return redirect()->back()->withErrors(['thumb' => $errorFile[0]]);
        }
        return ($this->postService->insert($request));
        //
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
         $dataItem = $this->postService->getWhere($slug);
         $title = 'Sửa bài đăng '. $dataItem->title;
         $dataCategory = $this->postService->getCategoryAll();
        $dataTag = $this->postService->getTagAll();
        return(view('admin.post.edit', compact('title', 'dataItem', 'dataCategory', 'dataTag')));
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
            'key_seo' => 'required',
            'description' => 'required',
            'content' => 'required',
        ], [
            'name.required' => '* Tên bài đăng không được để trống !',
            'key_seo.required' => '* Từ khóa Seo không được để trống !',
            'description.required' => '* Mô tả bài viết không được để trống !',
            'content.required' => '* Nội dung bài viết không được để trống !',
        ]);
        if($request->has('thumb')){
            $file = $request->thumb;
            $errorFile = $this->postService->CheckFile($file);
            if (count($errorFile)  != 0) {
                return redirect()->back()->withErrors(['thumb' => $errorFile[0]]);
            }
        }
        return ($this->postService->update($request, $slug));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return ($this->postService->destroy($request));
    }
}
