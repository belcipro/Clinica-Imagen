<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;
use Illuminate\Support\Facades\DB;
use Redirect;
class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Calendar::whereYear('fechaInicio', $request->year)
        ->whereMonth('fechaInicio', $request->month)
        ->orderBy('fechaInicio', 'desc')
        ->get()
        ->groupBy(function ($event) {
            return date("Y-m-d", strtotime($event->fechaInicio));
        });

        return response()->json($events);
    }
    public function listAll(Request $request){
        $events=Calendar::get();
        return response()->json($events);
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
        $calendar=new Calendar();
        $calendar->fechaInicio= $request->fechaInicio;
        $calendar->fechaFin= $request->fechaFin;
        $calendar->color= $request->color;
        $calendar->titulo= $request->titulo;
        $calendar->save();
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
    public function update(Request $request)
    {
        
        if (!$request->ajax()) return redirect('/');

        try{
            DB::beginTransaction();

            $calendar = Calendar::findOrFail($request->id);
            $calendar->fechaInicio= $request->fechaInicio;
            $calendar->fechaFin= $request->fechaFin;
            $calendar->color= $request->color;
            $calendar->titulo= $request->titulo;
            $calendar->save();

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if (!$request->ajax()) return redirect('/');
        try{
            DB::beginTransaction();

            $calendar = Calendar::findOrFail($id);
            $calendar->delete();

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }
    }
}
