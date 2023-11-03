<?php
session_start();

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";



class TablaClientes{

 	/*=============================================
 	 MOSTRAR LA TABLA DE AGENTES
  	=============================================*/ 

	public function mostrarTablaClientes(){

		$item = null;
		$valor = null;

  		$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);	

  		if(count($clientes) == 0){

  			echo '{"data": []}';

		  	return;
  		}


		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($clientes); $i++){

		  		$reporte =  "<div class='btn-group'><button class='btn btn-info btnEditarCliente' idCliente='".$clientes[$i]["id"]."' data-toggle='modal' data-target='#modalGenerarSolicitud'>Reporte</button></div>";
 

		  	$datosJson .='[
			      "'.$clientes[$i]["id"].'",
			      "'.$clientes[$i]["nombre"].'",
			      "'.$clientes[$i]["area"].', '.$clientes[$i]["sector"].', '.$clientes[$i]["localidad"].'-'.$clientes[$i]["referencia"].' ",
			       "'.$clientes[$i]["servicio"].'",
			        "'.$clientes[$i]["precio"].'",
					"'.$clientes[$i]["ultimo_pago"].'",
			      "'.$clientes[$i]["mes"].' '.$clientes[$i]["ano"].'",
			       "'.$clientes[$i]["telefono"].'",
			      "'.$reporte.'"

			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE AGENTES
=============================================*/ 
$activarPuestos = new TablaClientes();
$activarPuestos -> mostrarTablaClientes();

