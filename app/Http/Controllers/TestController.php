<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News ;

class TestController extends Controller
{
    //

    public function all_news(Request $request){
      $all_news= News::orderBy('id','desc')->get();
      $soft_deletes= News::onlyTrashed()->orderBy('id','desc')->get();

      return view('layout.all_news',['all_news' =>$all_news, 'soft_deletes' =>$soft_deletes]);

    }

    public function insert(){

      //$add= new News;
      $errors_message=[
        'title'=>trans('admin.title'),
        'desc'=>trans('admin.desc'),
        'user_id'=>trans('admin.add_by'),
        'content'=>trans('admin.content'),
        'status'=>trans('admin.status'),

      ];
      $data = $this->validate(request(), [
        'title'=>'required',
        'desc'=>'required',
        'user_id'=>'required',
        'content'=>'required',
        'status'=>'required',
      ],[],$errors_message);
      News::create(request()->all());
      return back();

    }
    public function delete($id=null){
      if($id !=null){
        $delnew = News::find($id);
        $delnew->delete();
      }else if(request()->has('id')){
        News::destroy(request('id'));
      }
       if(request()->has('restore') and request()->has('id')){
        News::whereIn('id',request('id'))->restore();
      }

      return redirect('allnews');

    }
}
