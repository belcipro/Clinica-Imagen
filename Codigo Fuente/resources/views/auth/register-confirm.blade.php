@extends('layouts.cliente')
@section('content')
@if($message['error']==true)
<div class="alert alert-error">
  {{$message['message']}}
</div>
@endif

@if($message['error']==false)
<div class="alert alert-success">
  Gracias por ser parte de nuestra familia.
</div>
<div class="alert alert-success">
  Su cuenta ha sido activada.!
</div>
@endif
<p><a href="{{ route('login') }}">Ingresar</a></p>
{{-- <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a> --}}
@endsection