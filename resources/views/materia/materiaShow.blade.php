@extends('layouts.basic')
@section('content')
    <h1>Detalle</h1>
    <a href="{{ route('materia.index') }}">
            Listado de Materias
    </a>
    <h4> {{ $materia->nombre }}</h4>
    <p>
        <ul>
            <li>Creditos: {{ $materia->credito }}</li>
            <li>Profesor: {{ $materia->profesor }}</li>
            <li>Turno: {{ $materia->turno }}</li>
            <li>Disponible: {{ $materia->disponible }}</li>
        </ul>
    </p>

    <form action="{{ route('materia.destroy', $materia) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">
            <span>Eliminar</span>
        </button>
    </form>
@endsection