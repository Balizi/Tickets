<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $role=Auth::user()->role;
        $data=Service::all();
        // dd($data);
        if($role=='1')
        {
            return view('admin',['services'=>$data]);
            // return $data;
        }else{
            return view('AddPosts',['services'=>$data]);
        }
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
