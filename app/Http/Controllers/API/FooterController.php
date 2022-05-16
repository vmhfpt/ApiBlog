<?php

namespace App\Http\Controllers\API;

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
    //
    public function index(){
         return ($this->footerService->getAllApi());
    }
    public function show(Request $request){
        $slug = $request->slug;
        return ($this->footerService->getDetailApi($slug));
    }
}
