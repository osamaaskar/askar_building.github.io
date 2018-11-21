<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
  public function login(){
    return view('login_admin');

  }
  public function login_post(){
    $remember = request()->has('remember')?true:false;
    if(Auth::guard('webadmin')->attempt(['email'=>request('email'),'password'=>request('password')],$remember)){
      return redirect('admin/path');
    }
    else{
      return back();
    }
  }
}
