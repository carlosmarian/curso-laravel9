@extends('layouts.app')

@section('title', 'Lista de Clientes')
@section('content')
<h1>Listagem dos usuários
    <a href="{{route('users.create')}}">Novo</a>
</h1>
<ul>
@foreach ($users as $user)
    <li>
        {{ $user->name }} -- {{ $user->email }}
        | <a href="{{ route('users.show', $user->id)}}"> detalhes</a>
        | <a href="{{ route('users.edit', $user->id)}}"> Editar</a>
    </li>
@endforeach
</ul>
@endsection
