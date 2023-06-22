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
                  <a href="{{route('home')}}">
                    <h5 class="card-title">Dashboard</h5>
                  </a>
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
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to the to do list application!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
