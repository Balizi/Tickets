<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Ticket</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('user/dashboard')}}">Show Posts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('user/AddPosts')}}">Add Posts</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-5 mb-5">
                    <div class="row">
                      <div class="col-md-6 mx-auto">
                        <div class="w-full max-w-xs">
                            <form class="rounded px-8  pb-8 mb-4" action="{{ url('user/AddPosts')}}" method="POST">
                                @foreach ($dataPost as $item)
                                  <div class="card mb-4">
                                      <div class="card-header">
                                        Title : <strong>{{$item['title']}}</strong>
                                        <span style="float: right">Service : <strong>{{$item->service->service}}</strong></span>
                                      </div>
                                      <div class="card-body">
                                      <p class="card-text mb-2">Content : {{$item['content']}}</p> 
                                      <a href="{{url("user/dashboard/delete/".$item['id'])}}" class="btn btn-danger">Delete</a>
                                      <a href="{{url("user/edit/".$item['id'])}}" class="btn btn-warning">Edit</a>
                                      <a href="{{url("user/edit/".$item['id'])}}" class="btn btn-success">Answer</a>
                                      </div>
                                      <div class="card-footer">
                                        Status : {{$item->status->status}}
                                      </div>
                                  </div>
                                @endforeach

                                {{-- @foreach ($dataPost as $item)
                                    <h2>Title : {{$item->title}}</h2>
                                    <h2>Content : {{$item->content}}</h2>
                                    <h2>id : {{$item->id}}</h2>
                                    <h2>status : {{$item->status}}</h2>
                                    <h2>Services : {{$item->service->service}}</h2>
                                @endforeach --}} 

                                 {{-- {{print_r($dataPost)}} --}}
                                 {{-- {{print_r($dataPost)}} --}}

                                  {{-- @foreach($dataPost as $item)
                                    <h2>title : {{$item['title']}}</h2>
                                    <h2>srvice : {{$item->service->service}}</h2>
                                    <h2>content : {{$item['content']}}</h2>
                                    <h2>status : {{$item->status->status}}</h2>
                                    <h2>----------------</h2>
                                  @endforeach --}}
                            </form>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

