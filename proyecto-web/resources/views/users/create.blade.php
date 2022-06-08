@extends('layouts.base')

@section('title', 'Crear usuario')

@section('content')

<div class="text-center mt-5 mb-5">
    <h2>Registrar</h2>
</div>

<form method="POST" action="{{ route('users.store') }}" class="w-25 m-auto">
    @csrf 
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
        <input type="text" class="form-control" name="nombre">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
        <input type="date" class="form-control" name="fecha_nacimiento">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Sexo</span>
        <select class="form-select" id="sexo" name="sexo">
          <option selected>Elige</option>
          <option value="M">Masculino (M)</option>
          <option value="F">Femenino (F)</option>
        </select>
      </div>
      <input type="submit" value="Registrar usuario" class="btn btn-primary">
</form>
@endsection