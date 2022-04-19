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
                    <a class="nav-link active" aria-current="page" href="{{url('admin/admin')}}">Show Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/AddService')}}">Add Service</a>
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
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Services</th>
                              <th scope="col">Created At</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($services as $post)
                              <tr>
                                <th scope="row">{{$post['id']}}</th>
                                <td>{{$post['service']}}</td>
                                <td>{{$post['created_at']}}</td>
                                <th ><a class="btn btn-danger" href="{{"admin/delete/".$post['id']}}">Delete</a></th>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


