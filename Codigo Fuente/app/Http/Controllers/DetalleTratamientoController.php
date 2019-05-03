<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\DetalleTratamiento;
class DetalleTratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $cita_model=(object)$request->cita;
        $detalle=(object)$request->detalle;
        $tratamiento_users=(object)$request->tratamiento_users;

        $cita=new Cita();
        $cita->titulo=$cita_model->titulo;
        $cita->fechaInicio=$cita_model->fechaInicio;
        $cita->fechaFin=$cita_model->fechaFin;
        $cita->color="#2EB598";
        $cita->idPaciente=$tratamiento_users->id_usuario;
        $cita->idEspecialista=64;
        $cita->tipo_consulta=2;
        $cita->estado="reservado";
        $cita->save();

        $detalleTratamiento=new DetalleTratamiento();
        $detalleTratamiento->id_tratamiento_usuario=$detalle->id_tratamiento_usuario;
        $detalleTratamiento->id_cita=$cita->id;
        $detalleTratamiento->pago=$detalle->pago;
        $detalleTratamiento->save();
        return $detalleTratamiento;
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
        $detalleTratamiento=DetalleTratamiento::find($id);
        $detalleTratamiento->id_tratamiento_usuario=$request->id_tratamiento_usuario;
        $detalleTratamiento->id_cita=$request->id_cita;
        $detalleTratamiento->pago=$request->pago;
        $detalleTratamiento->save();
        return $detalleTratamiento;
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
