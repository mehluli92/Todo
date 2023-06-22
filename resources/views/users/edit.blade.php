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
                <div class="card-header"><h3>Edit Task</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value={{$user->name}} required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            
                            <div class="col-md-6">
                                <select name="role" class="form-select" aria-label="Role">
                                    <option selected>{{$user->role}}</option>
                                    <option value="admin">Admin</option>
                                    <option value="other">Other</option>
                                  </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value={{$user->email}} required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn  btn-secondary">
                                    Edit User
                                </button>
                            </div>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
