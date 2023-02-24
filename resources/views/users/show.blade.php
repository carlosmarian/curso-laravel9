@extends('layouts.app')

@section('title', 'Usuário {{ $user->name }}')

@section('content')
<h1 class="text-2xl font-semibold leading-tigh py-2">Listagem do usuário {{ $user->name }}</h1
<ul>
    <li>{{ $user->name }}</li>
    <li>{{ $user->email }}</li>
    <li>{{ $user->created_at }}</li>
</ul>
<form action="{{ route('users.delete', $user->id) }}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit" class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Deletar</button>
</form>

@endsection
