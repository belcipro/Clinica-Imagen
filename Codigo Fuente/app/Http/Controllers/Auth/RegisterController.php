<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use App\Persona;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $rules = [
            'nombres' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:users',
            'num_documento' => 'required|max:8|min:8|unique:personas',
            'password' => 'required|min:6|confirmed',
        ];
        
        $messages = [
            'correo.unique' => 'Correo en uso',
            'correo.required' => 'Correo requerido',
            'num_documento.required' => 'DNI requerido',
            'num_documento.min' => 'Minimo 8 caracteres requerido',
            'num_documento.unique' => 'DNI en uso ',
            'nombres.required' => 'Nombre requerido',
            'password.confirmed' => 'la confirmación de la contraseña no coincide',
        ];
        $validator=Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
            
        }
        $persona = new Persona();
        $persona->nombre = strtoupper($request->nombres);
        $persona->apellidos =strtoupper($request->apellidos);
        $persona->tipo_documento = 'DNI';
        $persona->num_documento = $request->num_documento;
        $persona->email = $request->correo;
        $persona->save();

        $user = new User();
        $user->id = $persona->id;
        $user->idrol = 3;
        $user->usuario = strtoupper($request->usuario);
        $user->correo = $request->correo;
        $user->password = bcrypt( $request->password);
        $user->condicion = '0';            
        $user->token_confirmation = str_random(30);            
        $user->save();
        $dates=array('name' => $persona->nombre,'code'=>$user->token_confirmation);
        $this->Email($dates,$user->correo);
        return view('auth.register-complete', compact('user'));
    }
    function Email($dates,$email){
        Mail::send('emails.plantilla',$dates,function($message) use ($email){
            $message->subject('Bienvenido a la plataforma');  
            $message->to($email);  
            $message->from('soportepercovic@percovic.com','Percovic');  
        });
    }
}
