@extends('layouts.base')

@section('title', 'Editar usuario')

@section('content')

<div class="text-center mt-5 mb-5">
    <h2>Editar</h2>
</div>


<form method="POST" action="{{ route('users.update', $user) }}" class="w-25 m-auto">
    @csrf 
    @method('PUT')
    

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
        <input type="text" class="form-control" name="nombre" value="{{ $user->nombre }}">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
        <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $user->fecha_nacimiento }}">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Sexo</span>
        <select class="form-select" id="sexo" name="sexo">
          
          <option value="M" {{ $user->sexo == 'M' ? 'selected' : ''}}>Masculino (M)</option>
          <option value="F " {{ $user->sexo == 'F' ? 'selected' : ''}}>Femenino (F)</option>
        </select>
      </div>

      <input type="submit" value="Editar usuario" class="btn btn-primary">
</form>
@endsection