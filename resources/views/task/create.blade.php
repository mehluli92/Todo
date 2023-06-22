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
                <div class="card-header">Create Task</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf 
                        <div class="mb-3">
                            <label for="task" class="form-label">Task</label>
                            <input type="task" name="task" class="form-control" id="task" placeholder="eating">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="description" name="description" class="form-control" id="description" placeholder="This is a task">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
