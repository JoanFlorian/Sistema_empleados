    <input value="{{$empleado->id ?? ''}}" type="text" name="Nombres" id="Nombres" placeholder="Introduzca Nombre"><br>
    <input value="{{$empleado->Nombres ??''}}" type="text" name="PrimerApel" id="PrimerApel" placeholder="Introduzca Primer Apellido"><br>
    <input value="{{$empleado->PrimerApel ?? ''}}" type="text" name="SegundoApel" id="SegundoApel" placeholder="Introduzca Segundo Apellido"><br>
    <input value="{{$empleado->SegundoApel ?? ''}}" type="text" name="Correo" id="Correo" placeholder="Introduzca Email"><br>
    <input value="{{$empleado->correo ??''}}" type="file" name="Foto" id="Foto"><br>
    <input type="submit" value="Guardar">


