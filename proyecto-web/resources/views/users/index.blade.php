@extends('layouts.base')

@section('title', 'Consultar')

@section('content')
<div class="text-center mt-5">
    <h2>Todos los usuarios</h2>
</div>

<table class="table w-50     m-auto mb-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha de nacimiento</th>
            <th scope="col">Sexo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->nombre }}</td>
            <td>{{ $user->fecha_nacimiento }}</td>
            <td>{{ $user->sexo }}</td>
            <td width="10px"><a href="{{ route('users.edit', $user->id)}}"
                class="btn btn-primary btn-sm mb-2">Editar</a>
        </td>

        <td width="10px">
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection