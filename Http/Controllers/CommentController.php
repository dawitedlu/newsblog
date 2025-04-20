<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('user.comment');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.sport');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $image_name_save;
        $comment =new comment();

        $comment->comment = $request->comment;
        $comment->comment_id = $request->title_id;
        // $comment->comment_id=re
        $comment->save();
        return redirect()->back();
        // return redirect('/comment');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $x = $request->id;
        DB::table('comments')->where('id', $x)->delete();
        return redirect()->back()->with('success_message','message deleted successfully.');
    }
}
