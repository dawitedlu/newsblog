<?php

namespace App\Http\Controllers;
use App\Models\news;
use Illuminate\Http\Request;
// use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function nws(){
        $newsdata = news::all();
        return view('admin.dashboard',compact('newsdata'));
    }

    public function newsedit(Request $request){
        $x = $request->title_id;
        // dd($x);
        // $editnews = news::find($x);
        $editnews = news::where('title_id', $x)->get();
        if($editnews){
            return view('admin.edit',compact('editnews'));
        }
        // return view('admin.dashboard',compact('editnews'));
    }
    public function update(Request $request){
// dd($request);
        $image = $request->file('image')->getClientOriginalName();
        $image_name = $request->title;
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $image_name_save= $image_name.'.'.$image_ext;
        
        $y = $request->title_id;

        $request->file('image')->storeAs('public',$image_name_save);

        DB::table('news')
        ->where('title_id', $y)
        ->update([
            'title' => request('title'),
            'description' => request('description'),
            'image' => $image_name_save,
            'category' => request('category'),
        ]);
        return redirect('admin/dashboard')->with('success','news update successfully.');

        // $image= $request->image;
        // $image_name = $request->title;
        // $imagename = $image_name.'.'.$image->getClientOriginalExtension();
        // $request->image->move('news',$imagename);

        // return ($imagename);
    }

    public function delete(Request $request){
        $x = $request->title_id;
        DB::table('news')->where('title_id', $x)->delete();
        return redirect()->back()->with('success_message','news deleted successfully.');
    }
}
