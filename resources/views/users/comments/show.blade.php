@extends('layouts.app')

@section('title', "Listagem do Comentários do Usuário {$user->name}")

@section('content')
    <h1 class="text-2xl font-semibold leading-tigh py-2">Listagem do Comentários do Usuário {{ $user->name }}</h1>

    <ul>
        <li>{{ $comment->body }}</li>
        <li> <input type="checkbox" disabled {{ $comment->visible ? 'checked' : ''}}></li>
    </ul>

    <form action="{{ route('comments.destroy', ['idUser' => $user->id, 'idComment' => $comment->id]) }}" method="POST"
        class="py-12">
        @method('DELETE')
        @csrf
        <button type="submit"
            class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Deletar</button>
    </form>

@endsection
