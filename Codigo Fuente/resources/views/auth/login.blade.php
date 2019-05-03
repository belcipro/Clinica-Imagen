@extends('layouts.cliente')

@section('content')

{{-- <form method="post" action="#"> --}}
<form class="form-horizontal" method="POST" action="{{ route('login')}}">
    {{ csrf_field() }}
  <div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input type="email" class="form-control" name="correo" id="correo" value="{{ old('correo') }}" placeholder="Correo" required autofocus/>
    <label class="floating-label" for="correo">Correo</label>
    @if ($errors->has('correo'))
        <span class="help-block">
            <strong>{{ $errors->first('correo') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-material floating" data-plugin="formMaterial">
    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required/>
    <label class="floating-label" for="password">Contraseña</label>
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group clearfix">
    {{-- <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left">
      <input type="checkbox" id="inputCheckbox" name="remember">
      <label for="inputCheckbox">Remember me</label>
    </div> --}}
    <a class="float-right" href="{{ route('password.request') }}">¿Olvidó su contraseña?</a>
  </div>
  <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Ingresar</button>
  <a href="/login/facebook" class="btn btn-primary mt-10">
    <i class="fab fa-facebook-f"></i>
  </a>
  <a href="/login/google" class="btn btn-danger mt-10">
    <i class="fab fa-google"></i>
  </a>
  <a href="/login/twitter" class="btn btn-info mt-10">
    <i class="fab fa-twitter"></i>
  </a>
  
</form>

<p>Todavía no cuenta? Por favor vaya a <a href="{{ route('register') }}">Registrarte</a></p>

@endsection
