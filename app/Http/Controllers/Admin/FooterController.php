<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\FooterService\FooterService;
class FooterController extends Controller
{
    protected $footerService;
    public function __construct()
    {
          $this->footerService = new FooterService();
    }
    public function create(){
        $title = 'Thêm chân trang' ;
        return (view('admin.footer.add', compact('title')));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:footer,title',
            'content' => 'required',
        ], [
            'name.required' => '* Tiêu để chân trang được để trống !',
            'name.unique' => '* Tên chân trang đã tồn tại !',
            'content.required' => '* Nội dung chân trang không được để trống !',
        ]);
        return ($this->footerService->insert($request));
    }
    public function index(){
        return ($this->footerService->index());
    }
    public function destroy(Request $request){
        return ($this->footerService->delete($request));
    }
    public function show($slug){

        return ($this->footerService->show($slug));
    }
    public function update(Request $request, $slug){
        $validated = $request->validate([
            'name' => 'required',
            'content' => 'required',
        ], [
            'name.required' => '* Tiêu để chân trang được để trống !',
            'content.required' => '* Nội dung chân trang không được để trống !',
        ]);
          return ($this->footerService->update( $slug, $request));
    }
}
