<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\DetalleFactura;
use App\Producto;
use Carbon\Carbon;

//Controller Factura, archivo donde se hace el control de las reglas del negocio conernientes a las //facturas

class FacturaController extends Controller
{

    //Funcion index encargada de mostrar la lista de Facturas 
    //Parametro entrada:
    //Retrona la vista lista_factura
    public function index () {

        return view('factura.lista_factura');
    }

    //Funcion DataFacturas, funcion que devuelve un JSON con los datos de las facturas que se //encuentren en la tabla factura
    //Parametro entrada:
    //Retorna Un arreglo JSON con todas las facturas
    public function dataFacturas(){

    	$facturas = Factura::all();

    	$arrFacturas = [];
    	foreach ($facturas as $row){
    		$total = 0;
    		foreach($row->detalle as $detalle){
                $total = ($detalle->cantidad * $detalle->producto->precio);
    		}
    		$arrFact = array( $row->id,
    			Carbon::parse($row->created_at)->format('d/m/Y'),
    		    count($row->detalle),
    		    $total
    	    );

    		$arrFacturas[] = $arrFact;

    	}

        return response()->json(array("data" => $arrFacturas));
    }

    //Funcion showDetalle, encargada de mostrar el detalle de la factura identificada con el ID que //se recibe como parametro
    //Parametro entrada $factura: Nro factura
    //Retorna el view de detalle_factura
    public function showDetalle( $factura ){

    	$factura = Factura::find($factura);

        $total_factura = 0;
    	foreach($factura->detalle as $detalle){
            $total_factura += ($detalle->cantidad * $detalle->producto->precio);
    	}

    	$numItems = count($factura->detalle); 

        return view('factura.detalle_factura', compact('factura', 'total_factura', 'numItems'));

    }

}

