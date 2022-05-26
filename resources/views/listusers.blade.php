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
                    <a class="nav-link" aria-current="page" href="{{url('/admin/posts')}}">Show Tickets</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('admin/admin')}}">Show Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/AddService')}}">Add Service</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="{{url('/admin/listuser')}}">List Users</a>
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
                        <form action="" method="POST">
                          @csrf
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($listuser as $item)
                              <tr>
                                <th scope="row">{{$item['id']}}</th>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['email']}}</td>
                                <th ><a class="btn btn-danger" href="{{"deleteuser/".$item['id']}}">Delete</a></th>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


