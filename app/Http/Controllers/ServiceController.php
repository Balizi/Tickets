<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $role=Auth::user()->role;
        
        $dataPost=Post::all();
        
        if($role=='1')
        {
            //Redirect To Page admin and Show Tickets
            return view('Posts',['data'=>$dataPost]);
        }else{
            //Redirect To Page user and Show Tickets
            $postAnswer=DB::select("SELECT p.*,c.*  FROM posts p INNER JOIN comments c ON p.id like c.posts_id ORDER BY p.created_at");
            // return $postAnswer[0]->service;
            // return view('dashboard',['dataPost'=>$postAnswer]);

            // return $dataPost[0]->service->service;
            return view('dashboard',['dataPost'=>$dataPost]);
        }
    }

    public function Redirect()
    {
        $data=Service::all();
        return view('AddPosts',['services'=>$data]);
    }


    // Admin Show Tickets
    public function afficher()
    {
        $data=Service::all();
        return view('admin',['services'=>$data]);
    }

    public function create()
    {
        //
        return view('AddService');
    }

    public function store(Request $request)
    {
        $data=Service::all();
        $this->validate($request,['service'=>'required']);
        $post=new Service();
        $post->service=$request->service;
        $post->save();
        return view('AddService',['services'=>$data]);
    }

    public function destroy($id)
    {
        $data=Service::find($id);
        $data->delete();
        return redirect('admin/admin');
    }
}
