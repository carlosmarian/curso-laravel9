@extends('layouts.app')

@section('title', 'Editar usuário')
@section('content')
<h1 class="text-2xl font-semibold leading-tigh py-2">Editar o Usuário {{ $user->name }}</h1>

@include('includes.validation-form')

<form action="{{route('users.update', $user->id)}}" method="POST">
    {{-- <input type="hidden" name="_method" value="PUT"> --}}
    @method('PUT')
    @include('users._partials.form')
</form>
@endsection
