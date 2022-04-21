<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $data=Post::all();
        return view('dashboard',['dataPost'=>$data]);
    }

    

    public function try()
    {
        $data=Post::all();
        return view('posts',['data'=>$data]);
    }

    public function posts()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,['title'=>'required','content'=>'required','service'=>'required']);
        $post=new Post();
        $post->title=$request->title;
        $post->content=$request->content;

        $post->user_id=auth()->user()->id;
        $post->service_id=$request->service;
        $post->status_id=1;

        $post->save();
        $data=Service::all();
        return view('AddPosts',['services'=>$data]);
    }

    public function addAnswer()
    {
        return "end point";
    }

    public function destroy($id)
    {
        $data=Post::find($id);
        $data->delete();
        return redirect('user/dashboard');
    }

    public function edit($id)
    {
        $data=Post::all();
        $post=DB::select('select * from posts WHERE id=?',[$id]);
        return view('PostEdit',['post'=>$post,'data'=>$data]);
    }
    
    public function update(Request $request,$id)
    {
        $title=$request->input('title');
        $service=$request->input('service');
        $content=$request->input('content');
        DB::update('update posts set title=?, service=?, content=? WHERE id=?',[$title,$service,$content,$id]);
        return redirect('user/dashboard')->with('success','Data Updated');
    }

}
