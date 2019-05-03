<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Persona;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
    
    public function validation(Request $request)
    {
        $users = DB::table('users')->where('token_confirmation_password',$request->token)->get();
        if(empty($users[0])){
            $message=[
                'message'=>'El token de seguridad no es valido',
                'error'=>true,
            ];
            return view('auth.email', compact('message'));
        }
        if($users[0]->condicion=='0'){
            $message=[
                'message'=>'Su cuenta no esta activa',
                'error'=>true,
            ];
            return view('auth.email', compact('message'));
        }
        if($users[0]->condicion=='1'){
            $message=[
                'message'=>'token valido',
                'error'=>false,
            ];
            $user=User::find($users[0]->id);
            return view('auth.passwords.reset', compact('user','message'));
        }
    }
    protected function reset(Request $request)
    {
        $users = DB::table('users')->where('correo',$request->correo)->get();
        if(empty($users[0])){
            return back()
            ->withErrors(['correo' => trans('No tiene una cuenta con el correo ingresado')])
            ->withInput();
        }
        if($users[0]->condicion=='0'){
            $message=[
                'message'=>'Su cuenta no esta activa',
                'error'=>true,
            ];
            return back()
            ->withErrors(['correo' => trans('Su cuenta no esta activa')])
            ->withInput();
        }
        if($users[0]->condicion=='1'){
            $persona=Persona::find($users[0]->id);
            $user=User::find($users[0]->id);
            $user->token_confirmation_password = str_random(30);
            $user->save();
            $dates=array('name' => $persona->nombre,'code'=>$user->token_confirmation_password);
            $this->Email($dates,$user->correo);
            return view('auth.passwords.complete', compact('user'));
        }
        

    }
    protected function modification(Request $request)
    {
        $rules = [
            'password' => 'required|min:6|confirmed',
            'token' => 'required',
        ];
        
        $messages = [
            'token.required' => 'Toke requerido',
            'password.required' => 'la contraseña es obligatorio',
            'password.confirmed' => 'la contraseña no coincide',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        }

        $users = DB::table('users')->where('token_confirmation_password',$request->token)->get();
        if(empty($users[0])){
            return back()
            ->withErrors(['password' => trans('Token de seguridad no valido')])
            ->withInput();
        }
        if($users[0]->condicion=='1'){
            $user=User::find($users[0]->id);
            $user->password =  bcrypt( $request->password);
            $user->save();
            auth()->login($user);
            return redirect()->route('client');
        }
        

    }
    function Email($dates,$email){
        Mail::send('emails.plantilla-reset',$dates,function($message) use ($email){
            $message->subject('Restablecer contraseña');  
            $message->to($email);  
            $message->from('soportepercovic@percovic.com','Percovic');  
        });
    }

}
