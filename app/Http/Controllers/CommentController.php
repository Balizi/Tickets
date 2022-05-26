<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //
    public function show($id)
    {
        $postDetails=DB::select('select * from posts WHERE id=?',[$id]);
        $commment=$postDetails[0]->id;
        $CommentDetail=DB::select('SELECT * FROM comments c INNER JOIN users u on u.id=c.user_id WHERE c.posts_id=? ORDER BY c.created_at',[$commment]);
        return view('answer',['postId'=>$id,'user_id'=>auth()->user()->id,'postDetails'=>$postDetails,'CommentDetail'=>$CommentDetail]);
    }

    public function showDetails($id)
    {
        $postDetails=DB::select('select * from posts WHERE id=?',[$id]);
        $commment=$postDetails[0]->id;
        $CommentDetail=DB::select('SELECT * FROM comments c INNER JOIN users u on u.id=c.user_id WHERE c.posts_id=? ORDER BY c.created_at',[$commment]);


        return view('answerUser',['postId'=>$id,'user_id'=>auth()->user()->id,'postDetails'=>$postDetails,'CommentDetail'=>$CommentDetail]);
    }

    public function store(Request $request,$id)
    {
        // $data=Post::all();
        // $this->validate($request,['answer'=>'required']);
        // $cmt=new Comment();
        // $cmt->answer=$request->answer;
        // $cmt->user_id=auth()->user()->id;
        // $cmt->posts_id=$id;
        // $cmt->save();
        // return view('/dashboard',['dataPost'=>$data]);
        $this->validate($request,['answer'=>'required']);
        $pst=Post::find($request->id);
        $cmt=new Comment();
        if(auth()->user()->role)
        {
            if($pst->status=='nouveau')
            {
                $pst->status='répondu';
                $pst->save();
            }
        }
        $cmt=new Comment();
        $cmt->answer=$request->answer;
        $cmt->user_id=auth()->user()->id;
        $cmt->posts_id=$id;
        $cmt->save();
        return back();
    }

    public function storeComment(Request $request,$id)
    {
        $data=Post::all();
        $this->validate($request,['answer'=>'required']);
        $cmt=new Comment();
        $cmt->answer=$request->answer;
        $cmt->user_id=auth()->user()->id;
        $cmt->posts_id=$id;
        $cmt->save();
        return back();
    }

    public function close($id)
    {
        if(isset($_POST['fer']))
        {
            echo "<script>alert('yes')</script>";
            $pst=Post::find($id);
            $pst->status='fermer';
            $pst->save();
            return back();
        }
    }

    public function update(Request $request,$id)
    {
        // if(isset($_POST['close']))
        // {
        // }
        echo "<script>alert('yes')</script>";
        // $pst=Post::find($id);
        // $pst->status='répondu';
        // $pst->save();
        // return back();
    }
}
