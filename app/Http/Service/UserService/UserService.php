<?php

namespace App\Http\Service\UserService;
use Illuminate\Support\Facades\Auth;
class UserService {
   public function authenLogin($request){
       $email = $request->input('email');
       $password = $request->input('password');

       if (Auth::attempt(['email' => $email, 'password' => $password])) {
          return (redirect('admin/dashboard'));
       }else {
        return (redirect('admin/login')->with('error', 'Email hoặc mật khẩu không chính xác!'));
       }

   }
}
