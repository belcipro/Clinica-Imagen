@extends('layouts.FrontEnd.login')

@section('content')
    <div class="wrapper wrapper-full-page ">
        <div class="full-page register-page section-image" filter-color="black" data-image="{{ asset('img/chair.jpg') }}">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 mr-auto ml-auto">
                            <form method="POST" action="{{ route('postPatientSave') }}" aria-label="{{ __('Registrarse') }}" class="form">
                                @csrf
                                <div class="card card-signup text-center">
                                    <div class="card-header ">
                                        <h4 class="card-title">REGISTRARSE</h4>
                                        <div class="social">
                                            
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="row">
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Nombres', null) !!}
                                                        {!! Form::text('nombres', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                                   </div>
                                              </div>
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Apellido paterno', null) !!}
                                                        {!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                                   </div>
                                              </div>
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Apellido materno', null) !!}
                                                        {!! Form::text('apellido_materno', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                                   </div>
                                              </div>
                                         </div>
                                         <div class="row">
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('D.N.I.', null) !!}
                                                        {!! Form::number('dni', null, ['class' => 'form-control', 'required' => 'true']) !!}
                                                   </div>
                                              </div>
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Fecha de nacimiento', null) !!}
                                                        {!! Form::date('fecha_de_nacimiento', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'true']) !!}
                                                   </div>
                                              </div>
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Género', null) !!}
                                                        {!! Form::select('genero', ['1' => 'Masculino', '2' => 'Femenino'], null, ['class' => 'form-control']) !!}
                                                   </div>
                                              </div>
                                         </div>
                                         <div class="row">
                                              <div class="col-xl-6">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Dirección', null) !!}
                                                        {!! Form::text('direccion', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                                   </div>
                                              </div>
                                              <div class="col-xl-3">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Celular', null) !!}
                                                        {!! Form::text('celular', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                                   </div>
                                              </div>
                                              <div class="col-xl-3">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Telefono', null) !!}
                                                        {!! Form::text('telefono', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                                   </div>
                                              </div>
                                         </div>
                                         <div class="row">
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Males', null) !!}
                                                        {!! Form::text('enfermedad', null, ['class' => 'form-control']) !!}
                                                   </div>
                                              </div>
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Medicamentos', null) !!}
                                                        {!! Form::text('medicamentos', null, ['class' => 'form-control']) !!}
                                                   </div>
                                              </div>
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Alergias', null) !!}
                                                        {!! Form::text('alergias', null, ['class' => 'form-control']) !!}
                                                        {!! Form::hidden('estado', 1, ['class' => 'form-control']) !!}
                                                   </div>
                                              </div>
                                         </div>
                                         <div class="row">
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Correo electrónico', null) !!}
                                                        {!! Form::text('email', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                                                        {!! Form::hidden('user_type', 3, ['class' => 'form-control']) !!}
                                                   </div>
                                              </div>
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Contraseña', null) !!}
                                                        <input type="password" id="password" name="password" class="form-control">
                                                   </div>
                                              </div>
                                              <div class="col-xl-4">
                                                   <div class="form-group has-label">
                                                        {!! Form::label('Confirmar contraseña', null) !!}
                                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                                   </div>
                                              </div>
                                         </div>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="row">
                                            <div class="col-xl-6 mr-auto ml-auto">
                                                <button type="submit" class="btn btn-info btn-round btn-block">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection