@extends('layouts.app')

@section('title', "Atualização de Usuário {{ $user->name }}")

@section('content')
    <h1>Editar Usuário {{ $user->name }}</h1>

    @include('include.validation-form')

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT" />
        @include('users.partials.form')
    </form>
@endsection
