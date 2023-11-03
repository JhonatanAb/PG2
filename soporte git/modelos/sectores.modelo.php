<?php

require_once "conexion.php";

class ModeloSectores{


	/*=============================================
	MOSTRAR SERVICIOS
	=============================================*/

	static public function mdlDMostrarSectores(){

			$stmt = Conexion::conectar()->prepare("SELECT tvgc.id_sector as id_sector, tvgc.descripcion as descripcion
													FROM tvguates_cobrosnueva.sector tvgc");

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR SECTORES BY USUARIO
	=============================================*/

	static public function MdlMostrarSectoresByUsuario($Usuario){

		
			$stmt = Conexions::conectars()->prepare("SELECT usr.id_Usuario as id,
			usr.nombre_usuario as nom_usr,
			asig.id_sector id_sector,
			sec.descripcion as des_sector
			FROM tvguates_soporte.usuario usr
			INNER JOIN tvguates_soporte.asignacion asig
			ON usr.id_Usuario=asig.id_Usuario
			INNER JOIN tvguates_cobrosnueva.sector sec
			ON asig.id_sector=sec.id_sector
			WHERE usr.id_Usuario=$Usuario");
															

			

			$stmt -> execute();

			return $stmt -> fetchAll();		

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	CREAR SOLICITUD
	=============================================*/

	static public function mdlAsignarSector($datos){
	
					
		$stmt = Conexions::conectars()->prepare("INSERT INTO asignacion (id_sector, id_Usuario, estado, usuario_Modifica, fecha_Modifica, ip_Modifica) 
												VALUES (:id_sector,:id_Usuario,'9',:usuario_Modifica,:fecha_Modifica,'1.0.0.0')");

		$stmt->bindParam(":id_sector", $datos["id_sector"], PDO::PARAM_STR);
		$stmt->bindParam(":id_Usuario", $datos["id_Usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario_Modifica", $datos["usuario_Modifica"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_Modifica", $datos["fecha_Modifica"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

}
