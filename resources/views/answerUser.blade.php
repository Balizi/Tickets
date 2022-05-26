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
                          @if($postDetails[0]->status !== 'fermer')
                            <form action="{{ url('user/answerUser/'.$postId)}}" method="POST">
                              @csrf
                              <button class="btn btn-success" name="fer" style="background-color: Orange;color:white;float:right;" type="submit">
                                Closed
                              </button>
                            </form>
                          @elseif($postDetails[0]->status === 'fermer')
                            <button class="btn btn-success" name="fer" style="background-color: rgb(13, 255, 25);color:white;float:right;" type="submit">
                              Résolu
                            </button>
                          @endif
                            <p class="text-center"><strong >Details</strong></p>
                            <h1 class="mb-2"><b>Title</b> : {{$postDetails[0]->title}}</h1>
                            <h2 class="mb-2"><b>Content</b> : {{$postDetails[0]->content}}</h2>
                            <h2 class="mb-2"><b>Status</b> : {{$postDetails[0]->status}}</h2>
                            <p class="text-center"><strong >Comment</strong></p>



                            @foreach($CommentDetail as $cm)
                              <table style="width:100%;">
                                @if ($cm->role=="0")
                                  <tr style="float:left">
                                    <td style="padding-right: 10px;">{{$cm->name}} : </td>
                                    <td>{{$cm->answer}}</td>
                                  </tr>
                                  @else
                                  <tr style="float:right">
                                    <td style="padding-right: 10px;">{{$cm->answer}} :</td>
                                    <td style="padding-right: 10px;">{{$cm->name}}</td>
                                  </tr>
                                @endif
                              </table>
                            @endforeach
                             
                            @if($postDetails[0]->status !== 'fermer')
                            <form class="rounded px-8  pb-8 mb-4" style="margin-top: 70px" action="{{ url('user/answerUser/'.$postId)}}" method="POST">
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
                            @endif
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


