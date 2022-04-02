@extends('layouts.app')

@section('title', 'Cadastro de Usuários')

@section('content')
    <h1>Novo Usuário</h1>

    <form action="{{ route('users.store') }}" method="POST">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <input type="text" placeholder="Nome:" name="name" required>
        <input type="email" placeholder="E-mail:" name="email" required>
        <input type="password" placeholder="Senha:" name="password" required>
        <button type="submit">Enviar</button>
    </form>
@endsection
