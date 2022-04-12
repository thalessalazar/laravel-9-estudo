@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')
    <h1 class="text-2xl font-semibold leading-tigh py-2">Novo Usuário</h1>

    @include('includes.validation-form')

    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @include('users.partials.form')
    </form>

@endsection
