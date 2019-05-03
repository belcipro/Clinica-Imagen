@extends('layouts.cliente')
@section('content')
@if($message['error']==true)
<div class="alert alert-error">
  {{$message['message']}}
</div>
@endif
@if($message['error']==false)
<style>

</style>
    <div class="card-header">{{ __('Modificar contraseña') }}</div>
        <form method="POST" action="{{ route('password-modification') }}" aria-label="{{ __('Reset Password') }}">
        {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $user->token_confirmation_password }}">
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
            <div class="form-group row mb-0">
                <div style="margin: 0 auto;">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>

@endif
<p><a href="{{ route('login') }}">Ingresar</a></p>
{{-- <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a> --}}
@endsection
