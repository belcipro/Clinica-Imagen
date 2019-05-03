@extends('layouts.cliente')

@section('content')

<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
  <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="usuario" type="text"  maxlength="50" minlength="2" class="form-control" name="usuario" value="{{ old('usuario') }}" required autofocus>
    <label class="floating-label">Usuario</label>
    @if ($errors->has('usuario'))
        <span class="help-block">
            <strong>{{ $errors->first('usuario') }}</strong>
        </span>
    @endif
  </div>
  <div class="form-group{{ $errors->has('nombres') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="nombres"  maxlength="255" minlength="2" type="text" class="form-control" name="nombres" value="{{ old('nombres') }}" required autofocus>
    <label class="floating-label">Nombre</label>
    @if ($errors->has('nombres'))
        <span class="help-block">
            <strong>{{ $errors->first('nombres') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group{{ $errors->has('apellidos') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="apellidos"  maxlength="255" minlength="3" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" required>
    <label class="floating-label">Apellidos</label>
    @if ($errors->has('apellidos'))
        <span class="help-block">
            <strong>{{ $errors->first('apellidos') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="num_documento" type="number" maxlength="8" minlength="8" class="form-control" name="num_documento" value="{{ old('num_documento') }}" required>
    <label class="floating-label">DNI</label>
    @if ($errors->has('num_documento'))
        <span class="help-block">
            <strong>{{ $errors->first('num_documento') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="correo" type="email" maxlength="255" minlength="3" class="form-control" name="correo" value="{{ old('correo') }}" required>
    <label class="floating-label">Correo</label>
    @if ($errors->has('correo'))
        <span class="help-block">
            <strong>{{ $errors->first('correo') }}</strong>
        </span>
    @endif
  </div>
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input id="password" type="password" maxlength="255" minlength="8" class="form-control" name="password" required>
    <label class="floating-label">Contraseña</label>
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
  </div>
  <div class="form-group form-material floating" data-plugin="formMaterial">
    <input id="password-confirm" type="password" maxlength="255" minlength="8" class="form-control" name="password_confirmation" required>
    <label class="floating-label">Verificar contraseña</label>
  </div>

  <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Registraté</button>
</form>
<p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Ingresar</a></p>
{{-- <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a> --}}
@endsection