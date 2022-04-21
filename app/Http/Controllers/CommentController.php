<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //
    public function show($id)
    {
        $postDetails=DB::select('select * from posts WHERE id=?',[$id]);
        $statusId=$postDetails[0]->status_id;
        $commment=$postDetails[0]->id;
        $userId=$postDetails[0]->user_id;
        $StatusComment=DB::select('select * from statuses WHERE id=?',[$statusId]);
        // $CommentDetail=DB::select('select * from comments WHERE posts_id=?',[$commment]);
        // $CommentDetail=DB::select('SELECT * FROM comments c INNER JOIN users u on u.id=c.user_id WHERE c.user_id=? ORDER BY c.created_at',[$userId]);
        $CommentDetail=DB::select('SELECT * FROM comments c INNER JOIN users u on u.id=c.user_id WHERE c.posts_id=? ORDER BY c.created_at',[$commment]);
        $userDetails=DB::select('select * from users WHERE id=?',[$userId]);

        // foreach($CommentDetail as $cmt)
        // {
        //     echo $cmt->id;
        // }
        
        // print_r($CommentDetail);

        // echo $userId;
        // echo "Post Details";
        // echo "<br>";
        // print_r($postDetails);
        // echo "<br>";
        // echo "<br>";
        // echo "Status Details".$statusId;
        // echo "<br>";
        // echo "<br>";
        // echo $StatusComment[0]->status;
        // echo "<br>";
        // echo "<br>";
        // print_r($StatusComment);
        // echo "<br>";
        // echo "<br>";
        // echo "Comments Details".$commment;
        // echo "<br>";
        // print_r($CommentDetail);
        // die();
        // // dd();
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // if($userDetails[0]->role=='0')
        // {   
        //     echo "User";
        // }
        // echo "<br>";
        // print_r($userDetails);


        return view('answer',['postId'=>$id,'user_id'=>auth()->user()->id,'postDetails'=>$postDetails,'StatusComment'=>$StatusComment,'CommentDetail'=>$CommentDetail]);
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
