@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role_id" class="col-md-4 col-form-label text-md-end">Rol</label>
                        <div class="col-md-6">
                            <select name="role_id" id="role_id" class="form-control" required>
                                <option value="">Seleccione un rol</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @extends('layouts.app')

@section('content')

{{-- 
==============================================
 ALTERNATIVA PERSONALIZADA — FORMULARIO REGISTRO
==============================================


<div class="container d-flex justify-content-center" style="margin-top: 60px; margin-bottom: 40px;">
    <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4">

            <!-- Header -->
            <div class="card-header bg-success text-white text-center py-3 rounded-top">
                <h4 class="mb-0">Crear Cuenta</h4>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Nombre 
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nombre Completo</label>
                        <input id="name" type="text"
                               class="form-control form-control-lg @error('name') is-invalid @enderror"
                               name="name"
                               value="{{ old('name') }}"
                               required autofocus
                               placeholder="Tu nombre completo">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email 
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                        <input id="email" type="email"
                               class="form-control form-control-lg @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}"
                               required placeholder="correo@ejemplo.com">

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Contraseña 
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Contraseña</label>
                        <input id="password" type="password"
                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                               name="password"
                               required placeholder="Mínimo 8 caracteres">

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Confirmar contraseña 
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label fw-semibold">Confirmar Contraseña</label>
                        <input id="password-confirm" type="password"
                               class="form-control form-control-lg"
                               name="password_confirmation"
                               required>
                    </div>

                    {{-- Rol (excluyendo admin) 
                    <div class="mb-3">
                        <label for="role_id" class="form-label fw-semibold">Rol del Usuario</label>
                        <select name="role_id" id="role_id"
                                class="form-select form-select-lg" required>
                            <option value="">Seleccione un rol</option>

                            @foreach($roles as $role)
                                @if($role->name !== 'admin')
                                    <option value="{{ $role->id }}">
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Botón de registro 
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success btn-lg">
                            Crear Cuenta
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
--}}