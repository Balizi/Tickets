{{-- <h1>Holla</h1>
<h2>Post id : {{$postId}}</h2>
<h3> user id : {{$userId}}</h3> --}}

<x-app-layout>
    <x-slot name="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Ticket</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/admin/posts')}}">Show Posts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('admin/admin')}}">Show Service</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="{{url('admin/AddService')}}">Add Service</a>
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
                            <p class="text-center"><strong >Details</strong></p>
                            <h1 class="mb-2"><b>Title</b> : {{$postDetails[0]->title}}</h1>
                            <h2 class="mb-2"><b>Content</b> : {{$postDetails[0]->content}}</h2>
                            <h2 class="mb-2"><b>Status</b> : {{$StatusComment[0]->status}}</h2>
                            <p class="text-center"><strong >Comment</strong></p>



                            @foreach($CommentDetail as $cm)
                              @if ($cm->role=="0")
                                <div  style="float: right;color:#a0a0a0;" >{{$cm->name}} {{$cm->created_at}}</div>
                                <div style="float: right;color:red;" class="mt-2">{{$cm->answer}}</div>
                                @else
                                <p style="float: left;color:#a0a0a0;" >{{$cm->name}}</p>
                                <p style="float: left;" class="pt-3">{{$cm->answer}}</p>
                              @endif
                            @endforeach

                            <form class="rounded px-8  pb-8 mb-4" style="margin-top: 40px" action="{{ url('admin/answer/'.$postId)}}" method="POST">
                              @csrf
                              <div class="inline-block relative w-64 mb-4">
                                  <input type="hidden" name="">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Answer
                                  </label>
                                <textarea name="answer"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding
                                  border border-solid border-gray-300 rounded transition ease-in-out m-0
                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlTextarea1"
                                rows="3"
                                placeholder="Your message"></textarea>
                              </div>
                              
                              <div class="md:flex md:items-center">
                                <div class="md:w-2/3">
                                  <button class="btn btn-success" style="background-color: green;color:white;" type="submit">
                                    Answer
                                  </button>
                                </div>
                              </div>
                            </form>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


