<?php
session_start();

require_once "../controladores/solicitud.controlador.php";
require_once "../modelos/solicitud.modelo.php";



class TablaSolicitudes{

 	/*=============================================
 	 MOSTRAR LA TABLA DE AGENTES
  	=============================================*/ 

	public function mostrarTablaSolicitudes(){

  		$solicitud = ControladorSolicitud::ctrMostrarTodasLasSolicitudes();	

  		if(count($solicitud) == 0){

  			echo '{"data": []}';

		  	return;
  		}


		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($solicitud); $i++){

		  	

		  	$datosJson .='[
			      "'.$solicitud[$i]["idSolicitud"].'",
			      "'.$solicitud[$i]["tipoSolicitud"].'",			      
			      "'.$solicitud[$i]["descripcion"].'",
			      "'.$solicitud[$i]["prioridad"].'",
			      "'.$solicitud[$i]["estado"].'",
			      "'.$solicitud[$i]["nombreCliente"].'",
			      "'.$solicitud[$i]["telefono"].'",
			      "'.$solicitud[$i]["area"].','.$solicitud[$i]["sector"].','.$solicitud[$i]["localidad"].'-'.$solicitud[$i]["referencia"].'"
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
$activarPuestos = new TablaSolicitudes();
$activarPuestos -> mostrarTablaSolicitudes();

