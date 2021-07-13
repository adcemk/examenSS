@extends('layouts.basic')
@section('content')
    <h1>Detalle</h1>
    <a href="{{ route('estudiante.index') }}">
            Listado de Estudiantes
    </a>
    <h4> {{ $estudiante->nombre }}</h4>
    <p>
        <ul>
            <li>Codigo: {{ $estudiante->codigo }}</li>
            <li>Carrera: {{ $estudiante->carrera }}</li>
            <li>Creditos: {{ $estudiante->credito }}</li>
            <li>Correo: {{ $estudiante->correo }}</li>
        </ul>
    </p>

    <h4>
        Materias del Estudiante
    </h4>
    <p>
        <ul>
            @foreach ($estudiante->materias as $materia)
                <li> {{ $materia->nombre }}</li>
            @endforeach
        </ul>
    </p>

    <h4>
        Agregar Materias
    </h4>
    <p>
        <form action="{{ route('estudiante.add-materia', $estudiante) }}" method="POST">
            @csrf
            <label>
                <span>
                    Seleccione Materia
                </span>
                <select 
                    multiple
                    name="materia_id[]"
                >
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id }}" {{ array_search($materia->id, $estudiante->materias->pluck('id')->toArray()) !== false ? 'selected' : '' }}>{{ $materia->nombre }}</option>
                    @endforeach
                </select>
            </label>
            
            <button type="submit">
                <span>Actualizar</span>
            </button>
        </form>
    </p>

    <form action="{{ route('estudiante.destroy', $estudiante) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">
            <span>Eliminar</span>
        </button>
    </form>
@endsection