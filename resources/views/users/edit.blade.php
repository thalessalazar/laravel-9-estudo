@extends('layouts.app')

@section('title', "Atualização de Usuário {{ $user->name }}")

@section('content')
    <h1>Editar Usuário {{ $user->name }}</h1>

    @if ($errors->any())
        <ul class="error-form">
            @foreach ($errors->all() as $error)
                <li class="error-form-item">{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <input type="text" placeholder="Nome:" name="name" required value="{{ $user->name }}">
        <input type="email" placeholder="E-mail:" name="email" required value="{{ $user->email }}">
        <input type="password" placeholder="Senha:" name="password" required>
        <button type="submit">Enviar</button>
    </form>
@endsection
