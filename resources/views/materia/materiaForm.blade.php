@extends('layouts.basic')
@section('content')
    <h1>Formulario</h1>
    @if(isset($materia))
        <form action="{{ route('materia.update', $materia) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('materia.store') }}" method="POST">
    @endif
        @csrf
        <label for="credito">Creditos</label>
        <input type="number" name="credito" id="credito" value="{{ old('credito') ?? $materia->credito ?? '' }}"></input>

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? $materia->nombre ?? '' }}"></input>

        <label for="profesor">Profesor</label>
        <input type="text" name="profesor" id="profesor" value="{{ old('profesor') ?? $materia->profesor ?? '' }}"></input>

        <label for="turno">Turno</label>
        <input type="text" name="turno" id="turno" value="{{ old('turno') ?? $materia->turno ?? '' }}"></input>

        <label for="disponible">Disponible</label>
        <select name="disponible" id="disponible">
            <option value=1>Si</option>
            <option value=0>No</option>
        </select>

        <input type="submit" value="Guardar">
    </form>
@endsection