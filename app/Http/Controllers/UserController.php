<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        // dd($users);
        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
    }
}
