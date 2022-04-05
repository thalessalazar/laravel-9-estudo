@extends('layouts.app')

@section('title', 'Cadastro de Usuários')

@section('content')
    <h1>Novo Usuário</h1>

    @include('include.validation-form')

    <form action="{{ route('users.store') }}" method="POST">
        @include('users.partials.form')
    </form>
@endsection
