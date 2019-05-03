@extends('layouts.FrontEnd.login')

@section('content')
    <div class="wrapper wrapper-full-page ">
        <div class="full-page register-page section-image" filter-color="black" data-image="{{ asset('img/chair.jpg') }}">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 mr-auto ml-auto">
                            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="form">
                                @csrf
                                <div class="card card-signup text-center">
                                    <div class="card-header ">
                                        <h4 class="card-title">Iniciar sesión</h4>
                                        <div class="social">
                                            
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="now-ui-icons ui-1_email-85"></i>
                                                </div>                                
                                            </div>
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo electrónico" autocomplete="off">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <div class="input-group-text">
                                                <i class="now-ui-icons text_caps-small"></i>
                                              </div>
                                            </div>
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <button type="submit" class="btn btn-info btn-round btn-block">Iniciar Sesión</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @include('layouts.FrontEnd.footer') --}}
        </div>
    </div>
@endsection