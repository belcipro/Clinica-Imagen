<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consulta;
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $consultas = Consulta::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $consultas = Consulta::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }

        return [
            'pagination' => [
                'total'        => $consultas->total(),
                'current_page' => $consultas->currentPage(),
                'per_page'     => $consultas->perPage(),
                'last_page'    => $consultas->lastPage(),
                'from'         => $consultas->firstItem(),
                'to'           => $consultas->lastItem(),
            ],
            'consultas' => $consultas
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $consulta = new Consulta();
        $consulta->nombre = $request->nombre;
        $consulta->descripcion = $request->descripcion;
        $consulta->precio = $request->precio;
        $consulta->save();
    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $consulta = Consulta::findOrFail($request->id);
        $consulta->nombre = $request->nombre;
        $consulta->descripcion = $request->descripcion;
        $consulta->precio = $request->precio;
        $consulta->save();
    }
}
