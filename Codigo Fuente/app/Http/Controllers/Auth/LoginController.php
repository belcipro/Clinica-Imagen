<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\User;
use Redirect;
use App\Persona;
class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth/login');
    }
    
    public function redirectToProvider($provider=null)
    {
        
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider=null)
    {

       
        try{
            $user = Socialite::driver($provider)->user();
        }
        catch(\GuzzleHttp\Exception\ClientException $e){
            //dd($e);
            return redirect()->route('/'); 
        }
        
            $persona=Persona::firstOrCreate([
                'email'=>$user->getEmail(),
            ],[
                'nombre' => $user->getName(),
            ]);

            $createUser=User::firstOrCreate([
                'id'=>$persona->id,
                'correo'=>$user->getEmail(),
            ],[
                'usuario'=>$user->getNickname(),
                'condicion'=> '1',
                'idrol'=> 3,
                'idSocial'=>$user->getId(),
                'avatar'=>$user->getAvatar()
            ]);
            
            
        
        $userLogin=User::where('idSocial',$user->getId())->first();
        if($userLogin==null){
            $message=[
                'message'=>'Su cuenta ya esta en uso',
                'error'=>true,
            ];
            return view('auth.register-confirm',compact('message'));
        }
        auth()->login($userLogin);
        return redirect()->route('client'); 
    }
    public function login(Request $request){
        $this->validateLogin($request);        

        if (Auth::attempt(['correo' => $request->correo,'password' => $request->password,'condicion'=>1])){

            switch(Auth::user()->idrol){
                case 1:
                    return redirect()->route('main');
                case 2:
                    return redirect()->route('main');
                case 3:
                    return redirect()->route('client'); 
                default:
                    return redirect()->route('/'); 
            }
        }

        return back()
        ->withErrors(['correo' => trans('Credenciales incorrectos')])
        ->withInput(request(['correo']));

    }

    protected function validateLogin(Request $request){
        $this->validate($request,[
            'correo' => 'required|string',
            'password' => 'required|string'
        ]);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
