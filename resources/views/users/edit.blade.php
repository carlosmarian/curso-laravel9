@extends('layouts.app')

@section('title', 'Editar usuário')
@section('content')
<h1>Editar Usuário</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{route('users.update', $user->id)}}" method="POST">
    {{-- <input type="hidden" name="_method" value="PUT"> --}}
    @method('PUT')
    @csrf
    <input type="text" name="name" id="name" placeholder="Nome:" value="{{ $user->name}}">
    <input type="text" name="email" id="email" placeholder="E-mail:" value="{{ $user->email}}">
    <input type="password" name="password" id="password" placeholder="Senha:" >
    <button type="submit">
        Enviar
    </button>
</form>
@endsection
