<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;

class NewsController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('admin.create');
    }

    public function Store(Request $request)
    {
        $image = $request->file('image')->getClientOriginalName();
        $image_name = $request->title;
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $image_name_save= $image_name.'.'.$image_ext;

        $request->file('image')->storeAs('public/image',$image_name_save);
        //C:\Users\hp\Desktop\final-year-project\nw\nw\public\image
        // return $image_name_save;
        // $First_Name = $request->image_name_save;
        

        $news =new News();

        $news->title = request('title');
        $news->description = request('description');
        $news->image = $image_name_save;
        $news->category = request('category');
        $news->save();
        return redirect('/create')->with('success','news save successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
