<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tratamiento;

class TratamientoController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            if(!$request->all==''){
                $tratamientos = Tratamiento::orderBy('id', 'desc')->paginate(100);
            }
            else{
                $tratamientos = Tratamiento::orderBy('id', 'desc')->paginate(3);
            }
        }
        else{
            $tratamientos = Tratamiento::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }

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

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $tratamiento = new Tratamiento();
        $tratamiento->nombre = $request->nombre;
        $tratamiento->descripcion = $request->descripcion;
        $tratamiento->save();
    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $tratamiento = Tratamiento::findOrFail($request->id);
        $tratamiento->nombre = $request->nombre;
        $tratamiento->descripcion = $request->descripcion;
        $tratamiento->save();
    }
}