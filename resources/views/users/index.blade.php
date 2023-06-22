@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body bg-dark text-white">
                    <div class="header">
                        <b>
                            <h1>
                                Menu
                            </h1>
                            
                        </b>
                    </div>
                    @can('isAdmin')
                      <a href="{{route('users')}}">
                        <h4 class="card-title">Users</h4>
                      </a>
                      <a href="{{route('users.create')}}">
                        <h6 class="card-title">Add User</h6>
                      </a>
                  @endcan
                  <a href="{{route('tasks.store')}}">
                    <h4 class="card-title">Todos</h4>
                  </a>
                  <a href="{{route('tasks.create')}}">
                    <h6 class="card-title">Add Todo</h6>
                  </a>
                  
                  
                </div>
              </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>View all users</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   @foreach ($users as $user)
                   <h5>Id:</h5> {{$user->id}}
                    <h5>Name:</h5> {{$user->name}} <br> 
                    <h5>Role:</h5> {{$user->role}} <br>
                    <h5>email:</h5> {{$user->email}}

                    <form action="{{ route('users.delete',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-info" href="{{ route('users.view',$user->id) }}">Show</a>
                        <a class="btn btn-secondary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <hr>
                   @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
