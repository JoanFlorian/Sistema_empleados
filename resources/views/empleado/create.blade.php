<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
</head>
<body>

<form action="{{url('/empleado')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('empleado.form')
</form>

</body>
</html>