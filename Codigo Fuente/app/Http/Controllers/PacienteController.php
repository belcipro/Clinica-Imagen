<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $pacientes = Paciente::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $pacientes = Paciente::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }

        return [
            'pagination' => [
                'total'        => $pacientes->total(),
                'current_page' => $pacientes->currentPage(),
                'per_page'     => $pacientes->perPage(),
                'last_page'    => $pacientes->lastPage(),
                'from'         => $pacientes->firstItem(),
                'to'           => $pacientes->lastItem(),
            ],
            'pacientes' => $pacientes
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $paciente = new Paciente();
        $paciente->nombre = $request->nombre;
        $paciente->apellidos = $request->apellidos;
        $paciente->dni = $request->dni;
        $paciente->genero = $request->genero;
        $paciente->direccion = $request->direccion;
        $paciente->email = $request->email;
        $paciente->celular = $request->celular;
        $paciente->save();
    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $paciente = Paciente::findOrFail($request->id);
        $paciente->nombre = $request->nombre;
        $paciente->apellidos = $request->apellidos;
        $paciente->dni = $request->dni;
        $paciente->genero = $request->genero;
        $paciente->direccion = $request->direccion;
        $paciente->email = $request->email;
        $paciente->celular = $request->celular;
        $paciente->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $paciente = Paciente::findOrFail($request->id);
        $paciente->estado = '0';
        $paciente->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $paciente = Paciente::findOrFail($request->id);
        $paciente->estado = '1';
        $paciente->save();
    }
}