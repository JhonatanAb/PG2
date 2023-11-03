<?php

class ControladorSolicitud{

/*=============================================
	CONTROLADORES DASHBOARD
=============================================*/

static public function ctrMostrarSolicitudesEstadoFecha($estado, $fechaDesde, $fechaHasta){

		$respuesta = ModeloSolicitud::mdlMostrarSolicitudesEstadoFecha($estado, $fechaDesde, $fechaHasta);

		return $respuesta;
	}

	static public function ctrMostrarTotalSolicitudesPorPrioridad(){

		$respuesta = ModeloSolicitud::mdlMostrarTotalSolicitudesPorPrioridad();

		return $respuesta;
	}

	static public function ctrMostrarTotalSolicitudesPorTipo(){

		$respuesta = ModeloSolicitud::mdlMostrarTotalSolicitudesPorTipo();

		return $respuesta;
	}

	static public function ctrMostrarTotalAsignadasAndProceso(){

		$respuesta = ModeloSolicitud::mdlMostrarTotalAsignadasAndProceso();

		return $respuesta;
	}

	static public function ctrMostrarTotalFinalizadas($fecha){

		$respuesta = ModeloSolicitud::mdlMostrarTotalFinalizadas($fecha);

		return $respuesta;
	}


/*=============================================
	CREAR SOLICITUD
	=============================================*/

	static public function ctrCrearSolicitud(){

		if(isset($_POST["idCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["idCliente"])){
				echo'<script>

					console.log("si entro");

					</script>';

				date_default_timezone_set('America/Guatemala');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');
						$fechaActual = $fecha.' '.$hora;
				$ip = $_SERVER['REMOTE_ADDR'];
				$redireccionar = $_POST['redireccionar'];
			   	$tabla = "solicitud";
			   	$datos = array("id_cliente"=>$_POST["idCliente"],
			   					"fecha_creacion"=>$fechaActual,
			   					"descripcion"=>$_POST["agregarDescripcion"],
			   					"telefono"=>$_POST["agregarTelefono"],
			   					"tipo_solicitud"=>$_POST["tipoSolicitud"],
			   					"prioridad"=>$_POST["prioridad"],
			   					"ip_modifica"=>$ip
					           );

			   	$respuesta = ModeloSolicitud::mdlCrearSolicitud($tabla, $datos,$ip);

			   	if($respuesta == "ok"){

					echo'<script>

					Swal.fire({
						  type: "success",
						  title: "El cliente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "'.$redireccionar.'";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					Swal.fire({
						  type: "error",
						  title: "¡Error!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "'.$redireccionar.'";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR TODAS LAS SOLICITUDES
	=============================================*/

	static public function ctrMostrarTodasLasSolicitudes(){

		$respuesta = ModeloSolicitud::mdlMostrarSolicitudes();

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR SOLICITUDES POR SECTOR
	=============================================*/

	static public function ctrMostrarSolicitudesBySector($sector){

		$respuesta = ModeloSolicitud::mdlMostrarSolicitudesBySector($sector);

		return $respuesta;
	
	}
	/*=============================================
	MOSTRAR SOLICITUDES POR TIPO DASHBOARD
	=============================================*/

	static public function ctrMostrarSolicitudesByEstado($estado){

		$respuesta = ModeloSolicitud::mdlMostrarSolicitudesByEstado($estado);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR SOLICITUDES POR TIPO DASHBOARD
	=============================================*/

	static public function ctrMostrarSolicitudesByEstadoHoy($estado, $fecha){
		

		$respuesta = ModeloSolicitud::mdlMostrarSolicitudesByEstadoHoy($estado, $fecha);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR SOLICITUDES POR TECNICO
	=============================================*/

	static public function ctrMostrarSolicitudesByTecnico($usuario){

		$respuesta = ModeloSolicitud::mdlMostrarSolicitudesByTecnico($usuario);

		return $respuesta;
	
	}
	/*=============================================
	MOSTRAR SOLICITUDES POR TECNICO
	=============================================*/

	static public function ctrMostrarSolicitudesByTecnico2($usuario){

		$respuesta = ModeloSolicitud::mdlMostrarSolicitudesByTecnico2($usuario);

		return $respuesta;
	
	}

	/*=============================================
	ACTUALIZAR ESTADO SOLICITUD
	=============================================*/

	static public function ctrCambiarEstadoSolicitud(){

		if(isset($_GET["idSol"])){

			$idSol=$_GET["idSol"];
			$estado=$_GET["estado"];

			$respuesta = ModeloSolicitud::mdlCambiarEstadoSolicitud($idSol, $estado);

			if($respuesta == "ok"){

				echo'<script>

				Swal.fire({
					  icon: "success",
					  title: "El estado fue actualizado con exito",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "vista-tecnico-solicitud";

								}
							})

				</script>';

			}		

		}

	}

}
