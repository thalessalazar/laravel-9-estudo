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

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);

        // retorno fazendo redirect para detalhes e passo id
        // return redirect()->route('users.show', $user->id);

        // retorno fazendo redirect para listagem
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users.index');
    }
}
