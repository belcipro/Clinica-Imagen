<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\User;
use Auth;
use Redirect;
use App\Persona;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $roles = $request->roles;
        
        if ($buscar==''){
           
            if($roles==''){
                $personas = User::join('personas','users.id','=','personas.id')
                ->join('roles','users.idrol','=','roles.id')
                ->select('personas.id','personas.nombre','personas.tipo_documento','personas.num_documento','personas.direccion','personas.telefono','personas.email','users.usuario','users.password','users.condicion','users.idrol','roles.nombre as rol')
                ->orderBy('personas.id', 'desc')->paginate(3);
           }
           else{
                $personas = User::join('personas','users.id','=','personas.id')
                ->join('roles','users.idrol','=','roles.id')
                ->select('personas.id','personas.nombre','personas.tipo_documento','personas.num_documento','personas.direccion','personas.telefono','personas.email','users.usuario','users.password','users.condicion','users.idrol','roles.nombre as rol')
                ->where('roles.nombre', ''. $roles . '')
                ->orderBy('id', 'desc')->paginate(3);
           }
        }
        else{
           if($roles==''){
                if($criterio==''){
                        $personas = User::join('personas','users.id','=','personas.id')
                        ->join('roles','users.idrol','=','roles.id')
                        ->select('personas.id','personas.nombre','personas.tipo_documento','personas.num_documento','personas.direccion','personas.telefono','personas.email','users.usuario','users.password','users.condicion','users.idrol','roles.nombre as rol')
                        ->where('personas.nombre', 'like', '%'. $buscar . '%')
                        ->where('roles.nombre', 'Cliente')
                        ->orderBy('id', 'desc')->paginate(3);
                }
                else{
                    $personas = User::join('personas','users.id','=','personas.id')
                    ->join('roles','users.idrol','=','roles.id')
                    ->select('personas.id','personas.nombre','personas.tipo_documento','personas.num_documento','personas.direccion','personas.telefono','personas.email','users.usuario','users.password','users.condicion','users.idrol','roles.nombre as rol')
                    ->where(''.$criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
                }
                
           }
           else{
               if($criterio==''){
                    $personas = User::join('personas','users.id','=','personas.id')
                    ->join('roles','users.idrol','=','roles.id')
                    ->select('personas.id','personas.nombre','personas.tipo_documento','personas.num_documento','personas.direccion','personas.telefono','personas.email','users.usuario','users.password','users.condicion','users.idrol','roles.nombre as rol')
                    ->where('personas.nombre', 'like', '%'. $buscar . '%')
                    ->where('roles.nombre', 'Cliente')
                    ->orderBy('id', 'desc')->paginate(3);
               }
               else{
                    $personas = User::join('personas','users.id','=','personas.id')
                    ->join('roles','users.idrol','=','roles.id')
                    ->select('personas.id','personas.nombre','personas.tipo_documento','personas.num_documento','personas.direccion','personas.telefono','personas.email','users.usuario','users.password','users.condicion','users.idrol','roles.nombre as rol')
                    ->where(''.$criterio, 'like', '%'. $buscar . '%')
                    ->where('roles.nombre', ''. $roles . '')
                    ->orderBy('id', 'desc')->paginate(3);
               }
           }
        }
        
        return [
            'pagination' => [
                'total'        => $personas->total(),
                'current_page' => $personas->currentPage(),
                'per_page'     => $personas->perPage(),
                'last_page'    => $personas->lastPage(),
                'from'         => $personas->firstItem(),
                'to'           => $personas->lastItem(),
            ],
            'personas' => $personas
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        try{
            DB::beginTransaction();

            $persona = new Persona();
            $persona->nombre = $request->nombre;
            $persona->apellidos = $request->apellidos;
            $persona->tipo_documento = $request->tipo_documento;
            $persona->num_documento = $request->num_documento;
            $persona->direccion = $request->direccion;
            $persona->telefono = $request->telefono;
            $persona->email = $request->email;
            $persona->save();

            $user = new User();
            $user->id = $persona->id;
            $user->idrol = $request->idrol;
            $user->usuario = $request->usuario;
            $user->password = bcrypt( $request->password);
            $user->condicion = '1';            
            $user->save();

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }
    }
    public function registerCliente(Request $request)
    {
        try{
            DB::beginTransaction();
            $persona = new Persona();
            $persona->nombre = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->tipo_documento = 'DNI';
            $persona->num_documento = $request->dni;
            $persona->email = $request->correo;
            $persona->save();

            $user = new User();
            $user->id = $persona->id;
            $user->idrol = 3;
            $user->usuario = $request->usuario;
            $user->correo = $request->correo;
            $user->password = bcrypt( $request->password);
            $user->condicion = '0';            
            $user->token_confirmation = str_random(30);            
            $user->save();
            $dates=array('name' => $persona->nombre,'code'=>$user->token_confirmation);
            DB::commit();
            $this->Email($dates,$user->correo);
            return redirect('/login');
        } catch (Exception $e){
            DB::rollBack();
        }
    }
    public function activacionCliente(Request $request){
        $users = DB::table('users')->where('token_confirmation',$request->token)->get();
        if(empty($users[0])){
            $message=[
                'message'=>'El token no existe',
                'error'=>true,
            ];
            return view('auth.register-confirm', compact('message'));
        }
        if(!$users[0]->condicion=='0'){
            $message=[
                'message'=>'Su cuenta esta activa',
                'error'=>true,
            ];
            return view('auth.register-confirm', compact('message'));
        }
        if($users[0]->condicion=='0'){
            $user=User::find($users[0]->id);
            $user->condicion = '1';
            $user->save();
            $message=[
                'message'=>'Exito',
                'error'=>false,
            ];
            return view('auth.register-confirm', compact('message'));
        }
    }
    function Email($dates,$email){
        Mail::send('emails.plantilla',$dates,function($message) use ($email){
            $message->subject('Bienvenido a la plataforma');  
            $message->to($email);  
            $message->from('soportepercovic@percovic.com','Percovic');  
        });
    }
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction();

            $user = User::findOrFail($request->id);
            $persona = Persona::findOrFail($user->id);
            $persona->nombre = $request->nombre;
            $persona->tipo_documento = $request->tipo_documento;
            $persona->num_documento = $request->num_documento;
            $persona->direccion = $request->direccion;
            $persona->telefono = $request->telefono;
            $persona->email = $request->email;
            $persona->save();

            
            $user->usuario = $request->usuario;
            $user->password = bcrypt( $request->password);
            $user->condicion = '1';
            $user->idrol = $request->idrol;
            $user->save();

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }
    }
    public function updateLogin(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction();

            $user = User::findOrFail(Auth::user()->id);
            $persona = Persona::findOrFail($user->id);
            $persona->nombre = $request->nombres;
            $persona->num_documento = $request->num_documento;
            $persona->direccion = $request->direccion;
            $persona->telefono = $request->telefono;
            $persona->email = $request->email;
            $persona->save();
            $user->usuario = $request->usuario;
            $user->condicion = '1';
            $user->save();

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }
    }
    public function listData(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $personas = User::join('personas','users.id','=','personas.id')
        ->where('users.id',Auth::user()->id)
        ->get();
        
        return json_encode($personas[0]);
    }
    
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $user = User::findOrFail($request->id);
        $user->condicion = '0';
        $user->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $user = User::findOrFail($request->id);
        $user->condicion = '1';
        $user->save();
    }
    public function logoutLogin(){
        Auth::logout();
        return Redirect::to('/')->with('msg', 'Gracias por visitarnos!.');
    }
    public function doctorSearch(Request $request){
        $buscar = $request->buscar;

        if ($buscar==''){
            $personas = User::join('personas','users.id','=','personas.id')
            ->join('roles','users.idrol','=','roles.id')
            ->select('personas.id','personas.nombre','personas.apellidos','users.idrol','roles.nombre as rol')
            ->where('users.idrol',4)
            ->orderBy('id', 'desc')->paginate(10);
        }
        else{
            $personas = User::join('personas','users.id','=','personas.id')
            ->join('roles','users.idrol','=','roles.id')
            ->select('personas.id','personas.nombre','personas.apellidos','users.idrol','roles.nombre as rol')
            ->where('users.idrol',4)
            ->whereRaw('concat(personas.nombre, " ", personas.apellidos) like "%'.$buscar. '%"')
            ->orderBy('id', 'desc')->paginate(10);

        }
        
        return json_encode($personas);
    }
}
