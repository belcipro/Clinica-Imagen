<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Culqi\Culqi;
use App\Culqi\CulqiException;
use App\Cita;
use App\DetailPayment;
class PaymentController extends Controller
{

    public function citaPayment(){
        return view('payment.index');
    }
    public function misPagos(Request $request){
        return view('cliente.pagos.index');
    }
    public function misPagosSearch(Request $request){
        $criterio = $request->criterio;
        $paginate = $request->paginate;
        if ($request->buscar&&$request->buscar==''){

            $pagos = DetailPayment::join('cita as c','idCita','=','c.id')
            ->join('personas as p','c.idPaciente','=','p.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('detalle_pago.id as id','t.nombre as tipo_consulta', 'idPaciente', 'idPaciente', 'fechaInicio', 'fechaFin', 'titulo', 'detalle_pago.estado as estado','p.nombre','p.apellidos','detalle_pago.total','detalle_pago.created_at as created_at')
            ->where('idPaciente', \Auth::user()->id)
            ->orderBy('detalle_pago.id', 'desc')->paginate(10);
        }
        else if($request->dateStart){
            $dateStart = $request->dateStart;
            $dateEnd = $request->dateEnd;
            $pagos = DetailPayment::join('cita as c','idCita','=','c.id')
            ->join('personas as p','c.idPaciente','=','p.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('detalle_pago.id as id','t.nombre as tipo_consulta', 'idPaciente', 'idPaciente', 'fechaInicio', 'fechaFin', 'titulo', 'detalle_pago.estado as estado','p.nombre','p.apellidos','detalle_pago.total','detalle_pago.created_at as created_at')
            ->where('idPaciente', \Auth::user()->id)
            ->where($criterio, '>=', $dateStart)
            ->where($criterio, '<=', $dateEnd)
            ->orderBy('detalle_pago.id', 'desc')->paginate($paginate);
        }
        else{
            $buscar = $request->buscar;
            $pagos = DetailPayment::join('cita as c','idCita','=','c.id')
            ->join('personas as p','c.idPaciente','=','p.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('detalle_pago.id as id','t.nombre as tipo_consulta', 'idPaciente', 'idPaciente', 'fechaInicio', 'fechaFin', 'titulo', 'detalle_pago.estado as estado','p.nombre','p.apellidos','detalle_pago.total','detalle_pago.created_at as created_at')
            ->where('idPaciente', \Auth::user()->id)
            ->where($criterio, 'like', '%'. $buscar . '%')->orderBy('detalle_pago.id', 'desc')->paginate(10);
        }
        
        
        if(!$request->pdf){
            return [
                'pagination' => [
                    'total'        => $pagos->total(),
                    'current_page' => $pagos->currentPage(),
                    'per_page'     => $pagos->perPage(),
                    'last_page'    => $pagos->lastPage(),
                    'from'         => $pagos->firstItem(),
                    'to'           => $pagos->lastItem(),
                ],
                'pagos' => $pagos
            ];
        }
        else{
            $vistaUrl="pdf.reporte_pagos";
            return $this->crearPDF($pagos,$vistaUrl,$request->pdf);
        }
    }
    public function pagosSearch(Request $request){
        $criterio = $request->criterio;
        $paginate = $request->paginate;
        if ($request->buscar&&$request->buscar==''){

            $pagos = DetailPayment::join('cita as c','idCita','=','c.id')
            ->join('personas as p','c.idPaciente','=','p.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('detalle_pago.id as id','t.nombre as tipo_consulta', 'idEspecialista', 'idPaciente', 'fechaInicio', 'fechaFin', 'titulo', 'detalle_pago.estado as estado','p.nombre','p.apellidos','detalle_pago.total','detalle_pago.created_at as created_at')
            ->orderBy('detalle_pago.id', 'desc')->paginate(10);
        }
        else if($request->dateStart){
            $dateStart = $request->dateStart;
            $dateEnd = $request->dateEnd;
            $pagos = DetailPayment::join('cita as c','idCita','=','c.id')
            ->join('personas as p','c.idPaciente','=','p.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('detalle_pago.id as id','t.nombre as tipo_consulta', 'idEspecialista', 'idPaciente', 'fechaInicio', 'fechaFin', 'titulo', 'detalle_pago.estado as estado','p.nombre','p.apellidos','detalle_pago.total','detalle_pago.created_at as created_at')
            ->where($criterio, '>=', $dateStart)
            ->where($criterio, '<=', $dateEnd)
            ->orderBy('detalle_pago.id', 'desc')->paginate($paginate);
        }
        else{
            $buscar = $request->buscar;
            $pagos = DetailPayment::join('cita as c','idCita','=','c.id')
            ->join('personas as p','c.idPaciente','=','p.id')
            ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
            ->select('detalle_pago.id as id','t.nombre as tipo_consulta', 'idEspecialista', 'idPaciente', 'fechaInicio', 'fechaFin', 'titulo', 'detalle_pago.estado as estado','p.nombre','p.apellidos','detalle_pago.total','detalle_pago.created_at as created_at')
            ->where($criterio, 'like', '%'. $buscar . '%')->orderBy('detalle_pago.id', 'desc')->paginate(10);
        }
        
        
        if(!$request->pdf){
            return [
                'pagination' => [
                    'total'        => $pagos->total(),
                    'current_page' => $pagos->currentPage(),
                    'per_page'     => $pagos->perPage(),
                    'last_page'    => $pagos->lastPage(),
                    'from'         => $pagos->firstItem(),
                    'to'           => $pagos->lastItem(),
                ],
                'pagos' => $pagos
            ];
        }
        else{
            $vistaUrl="pdf.reporte_pagos";
            return $this->crearPDF($pagos,$vistaUrl,$request->pdf);
        }
    }
    public function pagoListSingle(Request $request){
        $id=$request->id;
        $pago = DetailPayment::join('cita as c','idCita','=','c.id')
        ->join('personas as p','c.idPaciente','=','p.id')
        ->join('tipo_consulta as t','c.tipo_consulta','=','t.id')
        ->select('detalle_pago.id as id','t.nombre as tipo_consulta', 'idEspecialista', 'idPaciente', 'fechaInicio', 'fechaFin', 'titulo', 'detalle_pago.estado as estado','p.nombre','p.apellidos','detalle_pago.total','detalle_pago.created_at as created_at')
        ->where('detalle_pago.id', $id)
        ->get();
        $vistaUrl="pdf.reporte_pagos";
        return $this->crearPDF($pago,$vistaUrl,$request->tipo);
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
    
    public function pagoUpdate(Request $request){

        $payment= DetailPayment::find($request->id);
        $payment->abono=$request->abono;
        $payment->estado='Pagado';
        $payment->save();
        return json_encode($payment);

    }
    public function Payment(Request $request)
    {

    	$idCita = $request->idCita;
    	$precio = $request->precio;
    	$idPaciente = $request->idPaciente;
    	$email = $request->email;
        $token = $request->token;
        $cita=Cita::findOrFail($idCita);
        if(!$cita){
            return false;
        }
    	if($token){ 
        	// Configurar tu API Key
        	$SECRET_API_KEY = "sk_test_kUZlBrOC1CjxHZtN";
    
        	// Autenticación
        	$culqi = new Culqi(array('api_key' => $SECRET_API_KEY));
        	try{
            	// Creamos Cargo a una tarjeta
            	$cargo = $culqi->Charges->create(
                	array(
                        "amount" => $precio*100,
                        "capture" => true,
                        "currency_code" => "PEN",
                        "description" => "Ahora reserve su consulta médica de manera mas eficaz y eficiente.",
                        "email" => $email,
                        "installments" => 0,
                        /*
                        "antifraud_details" => array(
                            "address" => "Av. Lima 123",
                            "address_city" => "LIMA",
                            "country_code" => "PE",
                            "first_name" => "Will",
                            "last_name" => "Muro",
                            "phone_number" => "9889678986",
                        ),
                        */
                        "source_id" => $token
                    )
                );
                if($cargo->outcome->code!=='AUT0000'){
                    return json_encode(['message'=>$cargo->outcome->user_message]);
                }
                if($cargo){
                    $cita->estado="reservado";
                    $cita->color="#2EB598";
                    $cita->save();
                    $payment= new DetailPayment();
                    $payment->idcita=$idCita;
                    $payment->tipo_pago="Targeta";
                    $payment->total=$precio;
                    $payment->abono=$precio;
                    $payment->card_number=$cargo->source->card_number;
                    $payment->email=$cargo->email;
                    $payment->client_ip=$cargo->source->client->ip;
                    $payment->card_brand=$cargo->source->iin->card_brand;
                    $payment->card_type=$cargo->source->iin->card_type;
                    $payment->card_category=$cargo->source->iin->card_category;
                    $payment->estado="Pagado";
                    $payment->save();
                }
                return json_encode(['message'=>"Su cita médica a sido pagado con exito"]);
            
        	} catch(Exception $e){
          		$cargo2= $e->getMessage();
          		return json_encode($cargo2);
        	}
        }       
    }
}

