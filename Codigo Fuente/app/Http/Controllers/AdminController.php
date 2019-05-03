<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if(Auth::user()->idrol!=3){
            return view('contenido/contenido');
        }
        if(Auth::user()->idrol==3){
            return redirect()->route('client'); 
        }
        else{
            return redirect()->route('/'); 
        }
    }
}
