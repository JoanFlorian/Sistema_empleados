@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('mensaje')}}
</div>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('empleado.create')}}" class="btn btn-success">Registrar Nuevo Empleado</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>P. Apellido</th>
            <th>S. Apellido</th>
            <th>Correo</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $datos)
        <tr>
            <td>{{$datos->id}}</td>
            <td><img src="{{asset('storage').'/'.$datos->Foto}}"></td>
            <td>{{$datos->Nombres}}</td>
            <td>{{$datos->PrimerApel}}</td>
            <td>{{$datos->SegundoApel}}</td>
            <td>{{$datos->Correo}}</td>
            <td><a href="{{url('empleado/'.$datos->id.'/edit')}}" class="btn btn-warning" >Editar</a> | <form action="{{url('/empleado/'.$datos->id)}}" method="POST">
            @csrf
            {{method_field('DELETE')}}
            <input type="submit" onclick="return confirm(' ¿Deseas Eliminar?')" class="btn btn-danger mt-1" value="Eliminar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$empleados->Links()}}
</div>
@endsection

</body>
</html>