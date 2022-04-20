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
                    <a class="nav-link" aria-current="page" href="{{url('user/dashboard')}}">Show Posts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="{{url('user/AddPosts')}}">Add Posts</a>
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
                                @csrf
                              <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                  Title
                                </label>
                                <input name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Title">
                              </div>
                              <div class="inline-block relative w-64">
                                <select name="service" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    @foreach ($services as $service)
                                      <option value="{{$service->id}}">{{$service->service}} </option>
                                    @endforeach
                                </select>
                              </div>

                              <div class="inline-block relative w-64 mb-4 mt-4">
                                <textarea name="content"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding
                                  border border-solid border-gray-300
                                  rounded
                                  transition
                                  ease-in-out
                                  m-0
                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                "
                                id="exampleFormControlTextarea1"
                                rows="3"
                                placeholder="Your message"
                              ></textarea>
                              </div>
                              
                              <div class="md:flex md:items-center">
                                <div class="md:w-2/3">
                                  <button class="btn btn-primary" style="background-color: blue;color:white;" type="submit">
                                    Add
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

