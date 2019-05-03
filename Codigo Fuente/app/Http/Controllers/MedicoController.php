<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medico;

class MedicoController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $medicos = Medico::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $medicos = Medico::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }
        

        return [
            'pagination' => [
                'total'        => $medicos->total(),
                'current_page' => $medicos->currentPage(),
                'per_page'     => $medicos->perPage(),
                'last_page'    => $medicos->lastPage(),
                'from'         => $medicos->firstItem(),
                'to'           => $medicos->lastItem(),
            ],
            'medicos' => $medicos
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $medico = new Medico();
        $medico->nombre = $request->nombre;
        $medico->apellidos = $request->apellidos;
        $medico->dni = $request->dni;
        $medico->cmp = $request->cmp;
        $medico->direccion = $request->direccion;
        $medico->celular = $request->celular;
        $medico->telefono = $request->telefono;
        $medico->email = $request->email;
        $medico->save();
    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $medico = Medico::findOrFail($request->id);
        $medico->nombre = $request->nombre;
        $medico->apellidos = $request->apellidos;
        $medico->dni = $request->dni;
        $medico->cmp = $request->cmp;
        $medico->direccion = $request->direccion;
        $medico->celular = $request->celular;
        $medico->telefono = $request->telefono;
        $medico->email = $request->email;
        $medico->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $medico = Medico::findOrFail($request->id);
        $medico->estado = '0';
        $medico->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $medico = Medico::findOrFail($request->id);
        $medico->estado = '1';
        $medico->save();
    }
}