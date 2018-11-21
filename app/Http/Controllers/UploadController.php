<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class UploadController extends Controller
{
    //
    public function upload(){
      Storage::disk('local')->put('text_file.txt',request('text'));
      return request('text');
    }
}
