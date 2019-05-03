<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\DetailPayment;
use App\Consulta;
use DB;
use Culqi\Culqi;
use Culqi\CulqiException;
use PDF;
class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('cliente.cita.create');
    }
    public function citaList(Request $request){
        $criterio = $request->criterio;
        $paginate = $request->paginate;
        if ($request->buscar&&$request->buscar==''){
            $cita=DB::table('cita as c')
            ->join('personas as p','c.idEspecialista','=','p.id')
            ->join('personas as client','c.idPaciente','=','client.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('c.id as id', 'idEspecialidad','t.nombre as tipo_consulta','t.precio as precio', 'idEspecialista', 'idPaciente', 'fechaInicio', 'fechaFin', 'color', 'titulo', 'c.estado as estado', 'regressive_date', 'payment_time','p.apellidos as apellidosEsp','p.nombre as nombreEsp','client.apellidos as apellidosCli','client.nombre as nombreCli')
            ->orderBy('c.id', 'desc')->paginate($paginate);
        }
        else if($request->dateStart){
            $dateStart = $request->dateStart;
            $dateEnd = $request->dateEnd;
            $cita=DB::table('cita as c')
            ->join('personas as p','c.idEspecialista','=','p.id')
            ->join('personas as client','c.idPaciente','=','client.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('c.id as id', 'idEspecialidad','t.nombre as tipo_consulta','t.precio as precio', 'idEspecialista', 'idPaciente', 'fechaInicio', 'fechaFin', 'color', 'titulo', 'c.estado as estado', 'regressive_date', 'payment_time','p.apellidos as apellidosEsp','p.nombre as nombreEsp','client.apellidos as apellidosCli','client.nombre as nombreCli')
            ->where($criterio, '>=', $dateStart)
            ->where($criterio, '<=', $dateEnd)
            ->orderBy('c.id', 'desc')->paginate($paginate);
        }
        else{
            $buscar = $request->buscar;
            $cita=DB::table('cita as c')
            ->join('personas as p','c.idEspecialista','=','p.id')
            ->join('personas as client','c.idPaciente','=','client.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('c.id as id', 'idEspecialidad','t.nombre as tipo_consulta','t.precio as precio', 'idEspecialista', 'idPaciente', 'fechaInicio', 'fechaFin', 'color', 'titulo', 'c.estado as estado', 'regressive_date', 'payment_time','p.apellidos as apellidosEsp','p.nombre as nombreEsp','client.apellidos as apellidosCli','client.nombre as nombreCli')
            ->where($criterio, 'like', '%'. $buscar . '%')->orderBy('c.id', 'desc')->paginate($paginate);
        }
        
        if(!$request->pdf){
            return [
                'pagination' => [
                    'total'        => $cita->total(),
                    'current_page' => $cita->currentPage(),
                    'per_page'     => $cita->perPage(),
                    'last_page'    => $cita->lastPage(),
                    'from'         => $cita->firstItem(),
                    'to'           => $cita->lastItem(),
                ],
                'citas' => $cita
            ];
        }
        else{
            $vistaUrl="pdf.reporte_citas";
            return $this->crearPDF($cita,$vistaUrl,$request->pdf);
        }
    }
    public function updateEstado(Request $request){
        $color="";
        if($request->estado=="pendiente") $color="#fbc02d";
        if($request->estado=="reservado") $color="#2EB598";
        if($request->estado=="anulado") $color="#b71c1c";
        $cita= Cita::find($request->id);
        $cita->estado=$request->estado;
        $cita->color=$color;
        $cita->save();
        return json_encode($cita);
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

        if (!$request->ajax()) return redirect('/');
        $fecha = date('Y-m-d H:i:s');
        $mod_date = strtotime($fecha."+ 10 hour");
        $newdate=date("Y-m-d H:i:s",$mod_date);
        //+10 minute
        //+10 hour
        //+10 second
        if($request->tipoPayment=="tarjeta"){
            $cita=new Cita();
            $cita->titulo="Cita";
            $cita->fechaInicio=$this->convertString($request->starts);
            $cita->fechaFin=$this->convertString($request->ends);
            $cita->color="#fbc02d";
            $cita->idPaciente=$request->id;
            $cita->idEspecialista=$request->idEspecialista;
            $cita->tipo_consulta=$request->tipoConsulta;
            $cita->estado="pendiente";
            $cita->payment_time=$newdate;
            $cita->save();
            $request->session()->put('idCita', $cita->id);
            return json_encode($cita);
        }
        if($request->tipoPayment=="consultoria"){
            $myCita=Cita::where('idPaciente',(\Auth::user()->id))->limit(1)->orderBy('id', 'desc')->get();
            if(!sizeof($myCita)){
                if(!$request->session()->get('maxCite')){
                    $request->session()->put('maxCite', 1);
                }
                else{
                    $request->session()->put('maxCite',  $request->session()->get('maxCite')+1);
                }
            }
            else{
                $detailpayment=DetailPayment::where('idcita',$myCita[0]->id)->where('created_at','>=',date('Y-m-d'))->limit(1)->orderBy('id', 'desc')->get();
                if(!sizeof($detailpayment)){
                    if(!$request->session()->get('maxCite')){
                        $request->session()->put('maxCite', 1);
                    }
                    else{
                        $request->session()->put('maxCite',  $request->session()->get('maxCite')+1);
                    }
                }
                else{
                    if($detailpayment[0]->estado=="Pagado"){
                        $request->session()->put('maxCite', 1);
                    }
                    else{
                        if(!$request->session()->get('maxCite')){
                            $request->session()->put('maxCite', 1);
                        }
                        else{
                            $request->session()->put('maxCite',  $request->session()->get('maxCite')+1);
                        }
                    } 
                }
            }
            if($request->session()->get('maxCite')<=1){
                $cita=new Cita();
                $cita->titulo="Cita";
                $cita->fechaInicio=$this->convertString($request->starts);
                $cita->fechaFin=$this->convertString($request->ends);
                $cita->color="#fbc02d";
                $cita->idPaciente=$request->id;
                $cita->idEspecialista=$request->idEspecialista;
                $cita->tipo_consulta=$request->tipoConsulta;
                $cita->estado="pendiente";
                $cita->payment_time=$newdate;
                $cita->save();
                
                $citaUpdate=Cita::findOrFail($cita->id);
                $consulta=Consulta::findOrFail($cita->tipo_consulta);
                $citaUpdate->estado="reservado";
                $citaUpdate->color="#2EB598";
                $citaUpdate->save();
                $payment= new DetailPayment();
                $payment->idcita=$cita->id;
                $payment->tipo_pago=$request->tipoPayment;
                $payment->total=$consulta->precio;
                $payment->abono=0;
                $payment->estado="No Pagado";
                $payment->save();
                return json_encode( $citaUpdate);
            }
            else{
                return response()->json(['error' => 'Solo se puede realizar una cita con el metodo de pago que seleccionaste'], 401);
            }

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $cita=Cita::where('id',$request->id)->get();
        return json_encode($cita);
        //
    }
    public function citasPayment(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $idCita=$request->session()->get('idCita');
        $cita=DB::table('cita as c')
            ->where('c.id',$idCita)
            ->join('personas as p','c.idEspecialista','=','p.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('c.id as id', 'idEspecialidad','t.nombre as tipo_consulta','t.precio as precio', 'idEspecialista', 'idPaciente', 'fechaInicio', 'fechaFin', 'color', 'titulo', 'c.estado as estado', 'regressive_date', 'payment_time','p.nombre','p.apellidos')
            ->get();
        return json_encode($cita);
        //
    }
    public function citasPaymentComplete(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $idCita=$request->session()->get('idCita');
        $cita=DB::table('cita as c')
            ->where('c.id',$idCita)
            ->join('personas as p','c.idEspecialista','=','p.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->join('detalle_pago as d','d.idCita','=','c.id')
            ->select('c.id as id','t.nombre as tipo_consulta','fechaInicio', 'fechaFin','titulo','p.nombre','p.apellidos','total','tipo_pago','d.estado','d.created_at')
            ->get();
        return json_encode($cita);
        //
    }
    public function citaListSingle(Request $request){
        $id=$request->id;
        $cita=DB::table('cita as c')
            ->join('personas as p','c.idEspecialista','=','p.id')
            ->join('personas as client','c.idPaciente','=','client.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('c.id as id', 'idEspecialidad','t.nombre as tipo_consulta','t.precio as precio', 'idEspecialista', 'idPaciente', 'fechaInicio', 'fechaFin', 'color', 'titulo', 'c.estado as estado', 'regressive_date', 'payment_time','p.apellidos as apellidosEsp','p.nombre as nombreEsp','client.apellidos as apellidosCli','client.nombre as nombreCli')
            ->where('c.id', $id)
            ->get();
        $vistaUrl="pdf.reporte_citas";
        return $this->crearPDF($cita,$vistaUrl,$request->tipo);
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

        $cita = Cita::findOrFail($request->id);
        $cita->titulo="Cita";
        $cita->fechaInicio=$this->convertString($request->starts);
        $cita->fechaFin=$this->convertString($request->ends);
        $cita->color="#fbc02d";
        $cita->observacion=$request->title==""?"Ninguna":$request->title;
        $cita->estado="Pendiente";
        $cita->save();
        return json_encode($cita);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    
    public function citasList(Request $request){
        if (!$request->ajax()) return redirect('/');
        $cita=DB::table('cita')
                        ->where('fechaInicio','>=',date('Y-m-d H:i:s'))
                        ->orderBy('id','desc')
                        ->get();
        return json_encode($cita);
        
    }
    public function citaCliente(Request $request){
        if (!$request->ajax()) return redirect('/');
        $cita=DB::table('cita')
                        ->where('idPaciente',$request->id)
                        ->orderBy('id','desc')
                        ->get();
        return json_encode($cita);
        
    }
    public function citaClienteEspecialista(Request $request){
        if (!$request->ajax()) return redirect('/');
        $cita=DB::table('cita as c')
            ->where('idPaciente',$request->id)
            ->orderBy('id','desc')
            ->join('personas as p','c.idEspecialista','=','p.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('c.id as id', 'idEspecialidad', 'idEspecialista', 'idPaciente', 'fechaInicio', 'fechaFin', 'color', 'titulo', 't.nombre as tipo_consulta', 'c.estado as estado', 'regressive_date', 'payment_time','p.nombre','p.apellidos')
                        ->get();
        return json_encode($cita);   
    }
    public function citaClienteEspecialistaSearch(Request $request){
        if (!$request->ajax()) return redirect('/');
        $cita=DB::table('cita as c')
            ->where('idPaciente',$request->id)
            ->where('estado',$request->estado)
            ->orderBy('id','desc')
            ->join('personas as p','c.idEspecialista','=','p.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('c.id as id', 'idEspecialidad', 'idEspecialista', 'idPaciente', 'fechaInicio', 'fechaFin', 'color', 'titulo', 't.nombre as tipo_consulta', 'c.estado as estado', 'regressive_date', 'payment_time','p.nombre','p.apellidos')
                        ->get();
        return json_encode($cita);   
    }
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $cita = Cita::findOrFail($request->id);
        $cita->estado = 'anulado';
        $cita->color = '#b71c1c';
        $cita->save();
        return json_encode($cita);
    }
    public function misCitas(){
        return  view('cliente.cita.miscitas');
    }
    public function listTipoConsulta(Request $request){
        if (!$request->ajax()) return redirect('/');
        $tipoConsulta=DB::table('tipo_consulta')
            ->get();
        return json_encode($tipoConsulta);   
    }
    public function misCitasId(Request $request){
        if (!$request->ajax()) return redirect('/');
        $request->session()->put('idCita', $request->idCita);
        return json_encode(["message"=>'exito al realizar']);
    }

    public function crearPDF($datos,$vistaUrl,$tipo){
        $data=$datos;
        $date= date('Y-m-d');
        $view=\View::make($vistaUrl,compact('data','date'))->render();
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf');}
    }
    public function crearReporte(){
        $vistaUrl="pdf.reporte_citas";
        $citas=Cita::all();
        return $this->crearPDF($citas,$vistaUrl,1);
    }
    function convertString ($date)
    {
        // convert date and time to seconds
        $sec = strtotime($date);

        // convert seconds into a specific format
        $date = date("Y-m-d H:i", $sec);

        // append seconds to the date and time
        $date = $date . ":00";

        // print final date and time
        return $date;
    }
}
