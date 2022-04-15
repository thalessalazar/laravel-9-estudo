<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        $users = $this->model->getAllUsers(search: $request->get('search', ''));

        // dd($users);
        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = $this->model->find($id);

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

        if ($request->image) {
            $path = $request->image->store('users');

            $data['image'] = $path;
        }

        $this->model->create($data);

        // retorno fazendo redirect para detalhes e passo id
        // return redirect()->route('users.show', $user->id);

        // retorno fazendo redirect para listagem
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $this->model->destroy($id);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = $this->model->find($id);

        if (!$user) return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        $user = $this->model->find($id);

        if (!$user) return redirect()->route('users.index');

        $data = $request->only('name', 'email');
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->image) {
            if ($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }

            $path = $request->image->store('users');

            $data['image'] = $path;
        }

        $user->update($data);

        return redirect()->route('users.index');
    }
}
