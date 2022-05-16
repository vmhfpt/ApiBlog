<?php

namespace App\View\Admin;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
class FooterAdmin
{

   public function compose(View $view)
   {
       $dataAdmin =  Auth::user();
       $view->with('dataAdmin', $dataAdmin );
   }
}
