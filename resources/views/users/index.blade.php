@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')
    <h1>
        Listagem de usuários
        (<a href="{{ route('users.create') }}">+</a>)
    </h1>

    <form action="{{ route('users.index') }}" method="GET">
        <input type="text" name="search" placeholder="Pesquisar">
        <button type="submit">Pesquisar</button>
    </form>

    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} - {{ $user->email }}
                <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
                <a href="{{ route('users.edit', $user->id) }}">Atualizar</a>
                <a href="{{ route('users.destroy', $user->id) }}">Remover</a>
            </li>
        @endforeach
    </ul>
@endsection
