<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function show($id)
    {
        return view('answer',['postId'=>$id,'user_id'=>auth()->user()->id]);
    }

    public function store(Request $request,$id)
    {
        $this->validate($request,['answer'=>'required']);
        $cmt=new Comment();
        $cmt->answer=$request->answer;
        $cmt->user_id=auth()->user()->id;
        $cmt->posts_id=$id;
        // dd($cmt);
        $cmt->save();
        return view('/AddService');
    }
}
