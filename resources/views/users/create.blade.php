@extends('layouts.app')

@section('title', 'Cadastro de Usuários')

@section('content')
    <h1>Novo Usuário</h1>

    @if ($errors->any())
        <ul class="error-form">
            @foreach ($errors->all() as $error)
                <li class="error-form-item">{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form action="{{ route('users.store') }}" method="POST">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <input type="text" placeholder="Nome:" name="name" required value="{{ old('name') }}">
        <input type="email" placeholder="E-mail:" name="email" required value="{{ old('email') }}">
        <input type="password" placeholder="Senha:" name="password" required>
        <button type="submit">Enviar</button>
    </form>
@endsection
