<?php

class ControladorSectores{


	/*=============================================
	MOSTRAR CATALOGO
	=============================================*/

	static public function ctrMostrarSectores(){

		$respuesta = ModeloSectores::mdlDMostrarSectores();

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR SECTORES BY USUARIO
	=============================================*/

	static public function ctrMostrarSectoresByUsuario($Usuario){

		$respuesta = ModeloSectores::MdlMostrarSectoresByUsuario($Usuario);

		return $respuesta;
	}

	/*=============================================
	ASIGNAR SECTOR
	=============================================*/

	static public function ctrAsignarSector(){

		if(isset($_POST["selectSector"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["selectSector"])){
				

				date_default_timezone_set('America/Guatemala');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');
						$fechaActual = $fecha.' '.$hora;
						$redireccionar = $_POST['redireccionar'];
			   			$datos = array("id_sector"=>$_POST["selectSector"],
			   					"id_Usuario"=>$_SESSION["sector-usuario"],
			   					"usuario_Modifica"=>$_SESSION["usuario"],
			   					"fecha_Modifica"=>$fechaActual
					           );

			   	$respuesta = ModeloSectores::mdlAsignarSector($datos);

			   	if($respuesta == "ok"){

					echo'<script>

					Swal.fire({
						  type: "success",
						  title: "Sector Asignado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "usuarios-perfil";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					Swal.fire({
						  type: "error",
						  title: "¡Ocurrio un error al asignar",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "usuarios-perfil";

							}
						})

			  	</script>';



			}

		}

	}

}
