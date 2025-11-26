<h1>{{$modo}} Empleados </h1>
<input value="{{ isset($empleado->Nombres) ? $empleado->Nombres : old('Nombres') }}" type="text" name="Nombres" id="Nombres" placeholder="Introduzca Nombre"><br>
<input value="{{ isset($empleado->PrimerApel) ? $empleado->PrimerApel : old('PrimerApel') }}" type="text" name="PrimerApel" id="PrimerApel" placeholder="Introduzca Primer Apellido"><br>
<input value="{{ isset($empleado->SegundoApel) ? $empleado->SegundoApel : old('SegundoApel') }}" type="text" name="SegundoApel" id="SegundoApel" placeholder="Introduzca Segundo Apellido"><br>
<input value="{{ isset($empleado->Correo) ? $empleado->Correo : old('Correo') }}" type="text" name="Correo" id="Correo" placeholder="Introduzca Email"><br>
<input type="file" name="Foto" id="Foto"><br>
@if(isset($empleado->foto))
    <img src="{{asset('storage').'/'.$empleado->foto}}" alt="">
@endif

<input type="submit" class="btn btn-warning mt-4" value="{{$modo}} Registro">

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
