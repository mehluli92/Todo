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
                <div class="card-header"><h3>User - {{$user->name}}</h3> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h5>Id:</h5> {{$user->id}}
                    <h5>Name:</h5> {{$user->name}} <br> 
                    <h5>Email:</h5> {{$user->email}} <br>
                    <h5>Role</h5> {{$user->role}}
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
