<?php
 namespace App\Extensions;

  use Illuminate\Http\Request;

trait AuthenticatesLogout
  {
      public function logout(Request $request)
         {
             $name = $this->guard()->getName();
             $this->guard()->logout();
             $request->session()->forget('permissions');
             $request->session()->forget($this->guard()->getName());
             $request->session()->regenerate();
             if(strpos($name,'admin') !== false){
                 return redirect('/admin');
             }else{
                 return redirect('/');;
             }
         }
 }