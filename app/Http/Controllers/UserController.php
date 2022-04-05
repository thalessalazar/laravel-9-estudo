<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::where(function ($query) use ($search) {
            if ($search) {
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%$search%");
            }
        })->get();
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

    public function store(StoreUpdateUserFormRequest $request)
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

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        $user = User::find($id);

        if (!$user) return redirect()->route('users.index');

        $data = $request->only('name', 'email');

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index');
    }
}
