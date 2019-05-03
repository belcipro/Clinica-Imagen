@extends('layouts.cliente')
@section('content')
<div class="alert alert-success">
  Se envio un mensaje a su correo {{$user->correo}} para poder modificar su contraseña.
</div>
<p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Ingresar</a></p>
{{-- <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a> --}}
@endsection