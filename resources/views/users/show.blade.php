@extends('layouts.app')

@section('title', 'Usuário {{ $user->name }}')

@section('content')
<h1>Listagem do usuário {{ $user->name }}</h1>
<ul>
    <li>{{ $user->name }}</li>
    <li>{{ $user->email }}</li>
    <li>{{ $user->created_at }}</li>
</ul>
<form action="{{ route('users.delete', $user->id) }}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit">Remover</button>
</form>

@endsection
