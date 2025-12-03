<h1 class="mb-4">{{ $modo }} Empleados</h1>

{{-- Errores --}}
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Campo Nombres --}}
<div class="mb-3">
    <label for="Nombres" class="form-label fw-semibold">Nombres</label>
    <input 
        value="{{ isset($empleado->Nombres) ? $empleado->Nombres : old('Nombres') }}"
        type="text"
        name="Nombres"
        id="Nombres"
        class="form-control form-control-lg"
        placeholder="Introduzca Nombre">
</div>

{{-- Primer Apellido --}}
<div class="mb-3">
    <label for="PrimerApel" class="form-label fw-semibold">Primer Apellido</label>
    <input 
        value="{{ isset($empleado->PrimerApel) ? $empleado->PrimerApel : old('PrimerApel') }}"
        type="text"
        name="PrimerApel"
        id="PrimerApel"
        class="form-control form-control-lg"
        placeholder="Introduzca Primer Apellido">
</div>

{{-- Segundo Apellido --}}
<div class="mb-3">
    <label for="SegundoApel" class="form-label fw-semibold">Segundo Apellido</label>
    <input 
        value="{{ isset($empleado->SegundoApel) ? $empleado->SegundoApel : old('SegundoApel') }}"
        type="text"
        name="SegundoApel"
        id="SegundoApel"
        class="form-control form-control-lg"
        placeholder="Introduzca Segundo Apellido">
</div>

{{-- Correo --}}
<div class="mb-3">
    <label for="Correo" class="form-label fw-semibold">Correo</label>
    <input 
        value="{{ isset($empleado->Correo) ? $empleado->Correo : old('Correo') }}"
        type="text"
        name="Correo"
        id="Correo"
        class="form-control form-control-lg"
        placeholder="Introduzca Email">
</div>

{{-- Foto --}}
<div class="mb-3">
    <label for="Foto" class="form-label fw-semibold">Foto</label>
    <input 
        type="file"
        name="Foto"
        id="Foto"
        class="form-control">

    @if(isset($empleado->foto))
        <div class="mt-3">
            <img src="{{ asset('storage') . '/' . $empleado->foto }}" 
                 alt="Foto del empleado" 
                 class="img-thumbnail" 
                 style="max-width: 180px;">
        </div>
    @endif
</div>

{{-- Botón --}}
<div class="mt-4">
    <input type="submit" class="btn btn-warning btn-lg px-5" value="{{ $modo }} Registro">
</div>
