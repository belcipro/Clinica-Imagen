@extends('layouts.cliente')
@section('content')
<div class="">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password-reset') }}" aria-label="{{ __('Restablecer la contraseña') }}">
    {{ csrf_field() }}


        <div class="form-group">
            <label for="correo" class="col-md-12 col-form-label">{{ __('E-Mail') }}</label>

            <div class="col-md-12">
                <input id="correo" type="email" class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}" name="correo" value="{{ old('correo') }}" required>
                @if ($errors->has('correo'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('correo') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 text-center" style="text-align:center;padding:8px;margin: 0 auto;">
                <button type="submit" class="btn btn-primary">
                    {{ __('Restablecer contraseña') }}
                </button>
            </div>
        </div>
    </form>
</div>
<p><a href="{{ route('login') }}">Ingresar</a></p>
{{-- <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a> --}}
@endsection