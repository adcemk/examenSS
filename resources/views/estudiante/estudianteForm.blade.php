@extends('layouts.basic')
@section('content')
    <h1>Formulario</h1>
    @if(isset($estudiante))
        <form action="{{ route('estudiante.update', $estudiante) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('estudiante.store') }}" method="POST">
    @endif
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $estudiante->nombre ?? '' }}"></input>

        <label for="codigo">Codigo</label>
        <input type="number" name="codigo" id="codigo" value="{{ old('codigo') ?? $estudiante->codigo ?? '' }}"></input>

        <label for="carrera">Carrera</label>
        <input type="text" name="carrera" id="carrera" value="{{ old('carrera') ?? $estudiante->carrera ?? '' }}"></input>

        <label for="credito">Creditos</label>
        <input type="number" name="credito" id="credito" value="{{ old('credito') ?? $estudiante->credito ?? '' }}"></input>

        <label for="correo">Correo</label>
        <input type="email" name="correo" id="correo" value="{{ old('correo') ?? $estudiante->correo ?? '' }}"></input>

        <input type="submit" value="Guardar">
    </form>
@endsection