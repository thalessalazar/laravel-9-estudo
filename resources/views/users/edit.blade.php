@extends('layouts.app')

@section('title', "Atualização de Usuário {{ $user->name }}")

@section('content')
    <h1 class="text-2xl font-semibold leading-tigh py-2">Editar Usuário {{ $user->name }}</h1>

    @include('includes.validation-form')

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT" />
        @include('users.partials.form')
    </form>
@endsection
