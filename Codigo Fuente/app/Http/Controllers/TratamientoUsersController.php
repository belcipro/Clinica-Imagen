<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TratamientoUsers;
use DB;
class TratamientoUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->id_usuario==''){
            $tratamiento=TratamientoUsers::where('id_usuario',$request->id_usuario)
            ->get();
            return $tratamiento;   
        }
        else{
            $criterio = $request->criterio;
            $tratamientos=DB::table('tratamiento_usuario as tu')
            ->join('personas as client','tu.id_usuario','=','client.id')
            ->select('tu.id','tu.precio as precio','tu.id_usuario', 'tu.fechaInicio', 'tu.fechaFin', 'tu.estado as estado', 'client.apellidos as apellidosCli','client.nombre as nombreCli')
            ->paginate(10);
        
            if(!$request->pdf){
                return [
                    'pagination' => [
                        'total'        => $tratamientos->total(),
                        'current_page' => $tratamientos->currentPage(),
                        'per_page'     => $tratamientos->perPage(),
                        'last_page'    => $tratamientos->lastPage(),
                        'from'         => $tratamientos->firstItem(),
                        'to'           => $tratamientos->lastItem(),
                    ],
                    'tratamientos' => $tratamientos
                ];
            }
        
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tratamientoUsers=new TratamientoUsers();
        $tratamientoUsers->id_tratamiento=$request->id_tratamiento;
        $tratamientoUsers->id_usuario=$request->id_usuario;
        $tratamientoUsers->precio=$request->precio;
        $tratamientoUsers->restante=$request->restante;
        $tratamientoUsers->estado=$request->estado;
        $tratamientoUsers->fechaInicio=$request->fechaInicio;
        $tratamientoUsers->fechaFin=$request->fechaFin;
        $tratamientoUsers->adelanto=$request->adelanto;
        $tratamientoUsers->save();
        return $tratamientoUsers;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tratamientoUsers=TratamientoUsers::find($id);
        if(isset($tratamientoUsers)){
            return response()->json('Not response',401);
        }
        $tratamientoUsers->id_tratamiento=$request->id_tratamiento;
        $tratamientoUsers->id_usuario=$request->id_usuario;
        $tratamientoUsers->precio=$request->precio;
        $tratamientoUsers->restante=$request->restante;
        $tratamientoUsers->estado=$request->estado;
        $tratamientoUsers->fechaInicio=$request->fechaInicio;
        $tratamientoUsers->fechaFin=$request->fechaFin;
        $tratamientoUsers->save();
        return $tratamientoUsers;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
