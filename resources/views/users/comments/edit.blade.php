@extends('layouts.app')

@section('title', "Editar Comentário para o usuário {$user->name}")

@section('content')
    <h1 class="text-2xl font-semibold leading-tigh py-2">Editar Comentário para o usuário {{ $user->name }}</h1>

    @include('includes.validation-form')

    <form action="{{ route('comments.update', ['idUser' => $user->id, 'idComment' => $comment->id]) }}" method="POST"
        enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT" />
        @include('users.comments.partials.form')
    </form>

@endsection
