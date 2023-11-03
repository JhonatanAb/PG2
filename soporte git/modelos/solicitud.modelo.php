<?php

require_once "conexions.php";

class ModeloSolicitud{
	/*=============================================
	MODELOS DASHBOARD
	=============================================*/
	static public function mdlMostrarTotalSolicitudesPorPrioridad(){

			$stmt = Conexions::conectars()->prepare("SELECT cd.descripcion as descripcion, 
													COUNT(s.id_solicitud) as total 
													FROM tvguates_soporte.solicitud s 
													INNER JOIN tvguates_soporte.datoscatalogo cd
													ON s.prioridad = cd.id_dato
													WHERE s.estado = 4 OR s.estado = 5
													GROUP BY cd.descripcion;
													");
		

			

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarTotalSolicitudesPorTipo(){

			$stmt = Conexions::conectars()->prepare("SELECT
												    cd.id_dato AS id,
												    cd.descripcion AS descripcion,
												    COUNT(s.tipo_solicitud) AS total
													FROM
												    tvguates_soporte.solicitud s
													INNER JOIN  tvguates_soporte.datoscatalogo cd ON
												    s.tipo_solicitud = cd.id_dato
													WHERE
												    s.estado = 4 OR s.estado = 5
													GROUP BY
												    cd.descripcion;");												

			

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarTotalAsignadasAndProceso(){

			$stmt = Conexions::conectars()->prepare("SELECT cd.id_dato as id, cd.descripcion as descripcion, 
													COUNT(s.estado) as total 
													FROM tvguates_soporte.solicitud s 
													INNER JOIN tvguates_soporte.datoscatalogo cd
													ON s.estado = cd.id_dato
													WHERE s.estado = 3 OR s.estado = 4 OR s.estado = 5
													GROUP BY cd.descripcion;");

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarTotalFinalizadas($fecha){

			$stmt = Conexions::conectars()->prepare("SELECT cd.id_dato as id, cd.descripcion as descripcion, COUNT(s.estado) as total FROM tvguates_soporte.solicitud s 
INNER JOIN tvguates_soporte.datoscatalogo cd
ON s.estado = cd.id_dato
WHERE s.estado = 6 and s.fecha_modifica >= '$fecha'  and s.fecha_modifica < date_add('$fecha', interval 1 day) 
GROUP BY cd.descripcion;");
		

			

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	CREAR SOLICITUD
	=============================================*/

	static public function mdlCrearSolicitud($tabla, $datos){
					echo'<script>
					console.log("'.$datos["id_cliente"].'");
					</script>';
					
		$stmt = Conexions::conectars()->prepare("INSERT INTO solicitud(id_cliente, fecha_creacion, descripcion, telefono, tipo_solicitud, prioridad, estado, usuario_modifica, fecha_modifica, ip_modifica) VALUES (:id_cliente, :fecha_creacion, :descripcion,:telefono, :tipo_solicitud, :prioridad, '4', 'n', '2023-01-01', 'n')");

		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_creacion", $datos["fecha_creacion"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);		
		$stmt->bindParam(":tipo_solicitud", $datos["tipo_solicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":prioridad", $datos["prioridad"], PDO::PARAM_STR);



		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR SOLICITUDES
	=============================================*/

	static public function mdlMostrarSolicitudes(){

			$stmt = Conexions::conectars()->prepare("SELECT 
													ss.id_solicitud as idSolicitud,
													sdc.descripcion as tipoSolicitud,
													ss.descripcion as descripcion,
													sdc2.descripcion as prioridad,
													sdc3.descripcion as estado,
													tcnc.nombre as nombreCliente,
													ss.telefono as telefono,
													tcna.descripcion as area,
													tcns.descripcion as sector,
													tcnc.referencia as referencia,
													tcnc.localidad as localidad
													from tvguates_soporte.solicitud ss
													INNER JOIN tvguates_soporte.datoscatalogo sdc
													ON ss.tipo_solicitud = sdc.id_dato 
													INNER JOIN tvguates_soporte.datoscatalogo sdc2
													ON ss.prioridad = sdc2.id_dato
													INNER JOIN tvguates_soporte.datoscatalogo sdc3
													ON ss.estado = sdc3.id_dato
													INNER JOIN tvguates_cobrosnueva.clientes tcnc
													ON ss.id_cliente = tcnc.id
													INNER JOIN tvguates_cobrosnueva.area tcna
													ON tcnc.id_area=tcna.id_area
													INNER JOIN tvguates_cobrosnueva.sector tcns
													ON tcnc.id_sector=tcns.id_sector
													");

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	ACTUALIZAR ESTADO SOLICITUD
	=============================================*/

	static public function mdlCambiarEstadoSolicitud($idSol, $estado){
					
					
		$stmt = Conexions::conectars()->prepare("UPDATE tvguates_soporte.solicitud ss
												SET ss.estado = $estado
												WHERE ss.id_solicitud = $idSol
												");

		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/*=============================================
	FINALIZAR SOLICITUD
	=============================================*/

	static public function mdlFinalizarSolicitud($idSol, $estado, $fecha, $observacion, $usuario){		
					
		$stmt = Conexions::conectars()->prepare("UPDATE tvguates_soporte.solicitud ss
												SET ss.estado = '$estado',
												ss.comentario = '$observacion',
												ss.fecha_resolucion = '$fecha',
												ss.usuario_modifica = '$usuario'
												WHERE ss.id_solicitud = $idSol
												");

		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


		/*=============================================
	MOSTRAR SOLICITUDES BY SECTOR
	=============================================*/

	static public function mdlMostrarSolicitudesBySector($sector){ 

			$stmt = Conexions::conectars()->prepare("SELECT
												    ss.id_solicitud AS idSolicitud,
												    sdc.descripcion AS tipoSolicitud,
												    ss.descripcion AS descripcion,
												    sdc2.descripcion AS prioridad,
												    sdc3.descripcion AS estado,
												    tcnc.nombre AS nombreCliente,
												    tcnc.telefono AS Telefono,
												    tcna.descripcion AS area,
												    tcns.descripcion AS sector,
												    tcnc.referencia AS referencia,
												    tcnc.localidad AS localidad
												FROM
												    tvguates_soporte.solicitud ss
												INNER JOIN tvguates_soporte.datoscatalogo sdc
												ON
												    ss.tipo_solicitud = sdc.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo sdc2
												ON
												    ss.prioridad = sdc2.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo sdc3
												ON
												    ss.estado = sdc3.id_dato
												INNER JOIN tvguates_cobrosnueva.clientes tcnc
												ON
												    ss.id_cliente = tcnc.id
												INNER JOIN tvguates_cobrosnueva.area tcna
												ON
												    tcnc.id_area = tcna.id_area
												INNER JOIN tvguates_cobrosnueva.sector tcns
												ON
												    tcnc.id_sector = tcns.id_sector
												WHERE tcnc.id_sector=$sector
												");

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR SOLICITUDES BY TECNICO
	=============================================*/

	static public function mdlMostrarSolicitudesByTecnico($usuario){ 

			$stmt = Conexions::conectars()->prepare("SELECT
												    s.id_solicitud AS idSol,
												    s.descripcion AS des,
												    s.estado AS estado,
												    s.fecha_creacion AS fc,
												    s.telefono as tlf,
												    cl.nombre AS nom,
												    cl.localidad AS loc,
												    cl.referencia AS ref,
												    tva.descripcion AS ar,
												    tvs.descripcion AS se,
												    dc.descripcion as ts,
												    dc2.descripcion as pr,
												    dc3.descripcion as est
												FROM
												    tvguates_soporte.solicitud s
												INNER JOIN tvguates_cobrosnueva.clientes cl
												ON
												    s.id_cliente = cl.id
												INNER JOIN tvguates_cobrosnueva.sector sec
												ON
												    cl.id_sector = sec.id_sector
												INNER JOIN tvguates_soporte.asignacion asig
												ON
												    sec.id_sector = asig.id_sector
												INNER JOIN tvguates_cobrosnueva.area tva
												ON
												    cl.id_area = tva.id_area
												INNER JOIN tvguates_cobrosnueva.sector tvs
												ON
												    cl.id_sector = tvs.id_sector
												INNER JOIN tvguates_soporte.datoscatalogo dc
												ON
												    s.tipo_solicitud = dc.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo dc2
												ON
												    s.prioridad = dc2.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo dc3
												ON
												    s.estado = dc3.id_dato
												WHERE
												    asig.id_Usuario = $usuario
												");

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR SOLICITUDES BY TECNICO
	=============================================*/

	static public function mdlMostrarSolicitudesByTecnico2($usuario){ 

			$stmt = Conexions::conectars()->prepare("SELECT
												    s.id_solicitud AS idSol,
												    s.descripcion AS des,
												    s.estado AS estado,
												    s.fecha_creacion AS fc,
												    s.telefono as tlf,
												    cl.nombre AS nom,
												    cl.localidad AS loc,
												    cl.referencia AS ref,
												    tva.descripcion AS ar,
												    tvs.descripcion AS se,
												    dc.descripcion as ts,
												    dc2.descripcion as pr,
												    dc3.descripcion as est
												FROM
												    tvguates_soporte.solicitud s
												INNER JOIN tvguates_cobrosnueva.clientes cl
												ON
												    s.id_cliente = cl.id
												INNER JOIN tvguates_cobrosnueva.sector sec
												ON
												    cl.id_sector = sec.id_sector
												INNER JOIN tvguates_soporte.asignacion asig
												ON
												    sec.id_sector = asig.id_sector
												INNER JOIN tvguates_cobrosnueva.area tva
												ON
												    cl.id_area = tva.id_area
												INNER JOIN tvguates_cobrosnueva.sector tvs
												ON
												    cl.id_sector = tvs.id_sector
												INNER JOIN tvguates_soporte.datoscatalogo dc
												ON
												    s.tipo_solicitud = dc.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo dc2
												ON
												    s.prioridad = dc2.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo dc3
												ON
												    s.estado = dc3.id_dato
												WHERE
												    asig.id_Usuario = $usuario and s.estado=4 or s.estado=5
												");

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}

		/*=============================================
	MOSTRAR SOLICITUDES BY TIPO DASHBOARD
	=============================================*/

	static public function mdlMostrarSolicitudesByEstado($estado){ 

			$stmt = Conexions::conectars()->prepare("SELECT
												    s.id_solicitud AS idSol,
												    s.descripcion AS des,
												    s.estado AS estado,
												    s.fecha_creacion AS fc,
												    s.telefono AS tlf,
												    cl.nombre AS nom,
												    cl.localidad AS loc,
												    cl.referencia AS ref,
												    tva.descripcion AS ar,
												    tvs.descripcion AS se,
												    dc.descripcion AS ts,
												    dc2.descripcion AS pr,
												    dc3.descripcion AS est
												FROM
												    tvguates_soporte.solicitud s
												INNER JOIN tvguates_cobrosnueva.clientes cl
												ON
												    s.id_cliente = cl.id
												INNER JOIN tvguates_cobrosnueva.sector sec
												ON
												    cl.id_sector = sec.id_sector
												INNER JOIN tvguates_soporte.asignacion asig
												ON
												    sec.id_sector = asig.id_sector
												INNER JOIN tvguates_cobrosnueva.area tva
												ON
												    cl.id_area = tva.id_area
												INNER JOIN tvguates_cobrosnueva.sector tvs
												ON
												    cl.id_sector = tvs.id_sector
												INNER JOIN tvguates_soporte.datoscatalogo dc
												ON
												    s.tipo_solicitud = dc.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo dc2
												ON
												    s.prioridad = dc2.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo dc3
												ON
												    s.estado = dc3.id_dato
												WHERE
												    s.estado = $estado
												");

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}

		/*=============================================
	MOSTRAR SOLICITUDES BY TIPO DASHBOARD
	=============================================*/

	static public function mdlMostrarSolicitudesByEstadoHoy($estado, $fecha){ 
		if ($fecha != '') {
			$stmt = Conexions::conectars()->prepare("SELECT
												    s.id_solicitud AS idSol,
												    s.descripcion AS des,
												    s.estado AS estado,
												    s.fecha_creacion AS fc,
												    s.telefono AS tlf,
												    s.comentario as comentario,
												    cl.nombre AS nom,
												    cl.localidad AS loc,
												    cl.referencia AS ref,
												    tva.descripcion AS ar,
												    tvs.descripcion AS se,
												    dc.descripcion AS ts,
												    dc2.descripcion AS pr,
												    dc3.descripcion AS est
												FROM
												    tvguates_soporte.solicitud s
												INNER JOIN tvguates_cobrosnueva.clientes cl
												ON
												    s.id_cliente = cl.id
												INNER JOIN tvguates_cobrosnueva.sector sec
												ON
												    cl.id_sector = sec.id_sector
												INNER JOIN tvguates_soporte.asignacion asig
												ON
												    sec.id_sector = asig.id_sector
												INNER JOIN tvguates_cobrosnueva.area tva
												ON
												    cl.id_area = tva.id_area
												INNER JOIN tvguates_cobrosnueva.sector tvs
												ON
												    cl.id_sector = tvs.id_sector
												INNER JOIN tvguates_soporte.datoscatalogo dc
												ON
												    s.tipo_solicitud = dc.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo dc2
												ON
												    s.prioridad = dc2.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo dc3
												ON
												    s.estado = dc3.id_dato
												WHERE
												    s.estado = $estado and s.fecha_resolucion = '$fecha'
												");
		}else{
			$stmt = Conexions::conectars()->prepare("SELECT
												    s.id_solicitud AS idSol,
												    s.descripcion AS des,
												    s.estado AS estado,
												    s.fecha_creacion AS fc,
												    s.telefono AS tlf,
												    s.comentario as comentario,
												    cl.nombre AS nom,
												    cl.localidad AS loc,
												    cl.referencia AS ref,
												    tva.descripcion AS ar,
												    tvs.descripcion AS se,
												    dc.descripcion AS ts,
												    dc2.descripcion AS pr,
												    dc3.descripcion AS est
												FROM
												    tvguates_soporte.solicitud s
												INNER JOIN tvguates_cobrosnueva.clientes cl
												ON
												    s.id_cliente = cl.id
												INNER JOIN tvguates_cobrosnueva.sector sec
												ON
												    cl.id_sector = sec.id_sector
												INNER JOIN tvguates_soporte.asignacion asig
												ON
												    sec.id_sector = asig.id_sector
												INNER JOIN tvguates_cobrosnueva.area tva
												ON
												    cl.id_area = tva.id_area
												INNER JOIN tvguates_cobrosnueva.sector tvs
												ON
												    cl.id_sector = tvs.id_sector
												INNER JOIN tvguates_soporte.datoscatalogo dc
												ON
												    s.tipo_solicitud = dc.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo dc2
												ON
												    s.prioridad = dc2.id_dato
												INNER JOIN tvguates_soporte.datoscatalogo dc3
												ON
												    s.estado = dc3.id_dato
												WHERE
												    s.estado = $estado 
												");
		}

			

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}
}

	



