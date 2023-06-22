<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function users()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    public function createUser()
    {
        return view('users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = 'Password';
        $user->role = $request->role;

        $user->save();

        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    public function viewUser($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $users = User::all();
        return view('users.edit')->with('user', $user)
                                 ->with('users', $users);
    }

    public function updateUser(Request $request,$id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = 'Password';

        $user->save();

        $users = User::all();
        return view('users.index')->with('user', $user)
                                  ->with('users', $users);

    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        $users = User::all();
        return view('users.index')->with('users', $users);
    }
}
