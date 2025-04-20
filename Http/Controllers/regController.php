<?php

namespace App\Http\Controllers;
use App\Models\news;
use App\Models\comment;
use Illuminate\Container\Attributes\DB;

use Illuminate\Http\Request;

class regController extends Controller
{
    public function index1(){

        // $data = news::all();
        $data = News::where('category', 'sport')->get();

        return view('user.sport',compact('data'));
    }
    public function index2(){
        $data = News::where('category', 'entertainment')->get();

        return view('user.enter',compact('data'));
        // return view('user.enter'); 
    }
    public function index3(){
        $data = News::where('category', 'technology')->get();

        return view('user.tech',compact('data'));
    }
    public function index4(){
        $data = News::where('category', 'business')->get();

        return view('user.business',compact('data'));
    }

    public function index5(Request $request){        
        $c = $request->title_id;
        $com = comment::where('comment_id', $c)->get();
        return view('user.comment',compact('com'));
    }
    public function index6(){
        $newsdata = news::all();
        return view('welcome',compact('newsdata'));
    }

    public function comm(Request $request){
        $c = $request->title_id;
        $com = comment::where('comment_id', $c)->get();
        return view('admin.comment',compact('com'));
    }
}
