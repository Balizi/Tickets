<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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

    public function deleteuser($id)
    {
        $data=User::find($id);
        $data->delete();
        return redirect('admin/listuser');
    }
}
