@extends('layouts.app')
@section('content')
<div class="container">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
</head>
<body>

<form action="{{url('/empleado/'.$empleado->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('empleado.form',['modo'=>'Actualizar'])
</form>
</div>
@endsection

</body>
</html>