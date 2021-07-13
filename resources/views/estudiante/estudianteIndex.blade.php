@extends('layouts.basic')
@section('content')
    <h1>Listado</h1>
    <a href="{{ route('estudiante.create') }}">
            Agregar Estudiante
    </a>
    <table border=1>
        <tr>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Carrera</th>
            <th>Creditos</th>
            <th>Correo</th>
            <th>Accion</th>
        </tr>
        @foreach ($estudiantes as $estudiante)
            <tr>
                <td> <a href="{{ route('estudiante.show', $estudiante->id) }}">{{$estudiante->nombre}}</a></td>
                <td> {{$estudiante->codigo}}</td>
                <td> {{$estudiante->carrera}}</td>
                <td> {{$estudiante->credito}}</td>
                <td> {{$estudiante->correo}}</td>
                <td> <a href=" {{ route('estudiante.edit', $estudiante) }} ">Editar</a></td>
            <tr>
        @endforeach
    </table>
@endsection