@extends('layouts.basic')
@section('content')
    <h1>Index</h1>
    <a href="{{ route('materia.create') }}">
            Agregar Materia
    </a>
    <table border=1>
        <tr>
            <th>Creditos</th>
            <th>Nombre</th>
            <th>Profesor</th>
            <th>Turno</th>
            <th>Disponible</th>
            <th>Accion</th>
        </tr>
        @foreach ($materias as $materia)
            <tr>
                <td> {{$materia->credito}}</td>
                <td> <a href="{{ route('materia.show', $materia->id) }}">{{$materia->nombre}}</a></td>
                <td> {{$materia->profesor}}</td>
                <td> {{$materia->turno}}</td>
                <td> {{$materia->disponible}}</td>
                <td> <a href=" {{ route('materia.edit', $materia) }} ">Editar</a></td>
            <tr>
        @endforeach
    </table>
@endsection