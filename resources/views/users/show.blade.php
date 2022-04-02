@extends('layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')
    <h1>
        Visualização de Usuário
    </h1>

    <h1>{{ $user->id }}</h1>
    <h1>{{ $user->name }}</h1>
    <h1>{{ $user->email }}</h1>
@endsection
