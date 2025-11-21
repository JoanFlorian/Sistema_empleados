
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    LISTA LOS DATOS DE LOS EMPLEADOS
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
            <td>{{$datos->Foto}}</td>
            <td>{{$datos->Nombres}}</td>
            <td>{{$datos->PrimerApel}}</td>
            <td>{{$datos->SegundoApel}}</td>
            <td>{{$datos->Correo}}</td>
            <td><a href="{{url('empleado/'.$datos->id.'/edit')}}">Editar</a> | <form action="{{url('/empleado/'.$datos->id)}}" method="POST">
            @csrf
            {{method_field('DELETE')}}
            <input type="submit" onclick="return confirm(' ¿Deseas Eliminar?')" value="Eliminar">
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{route('empleado.create')}}">Crear Empleado</a>
</body>
</html>