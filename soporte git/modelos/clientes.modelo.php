<?php

require_once "conexion.php";

class ModeloClientes{

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientesBySectorAndLocalidad($id_sector, $nombre_localidad){

	

			$stmt = Conexion::conectar()->prepare("SELECT clientes.id, clientes.nombre, clientes.telefono, clientes.NIT, clientes.localidad, clientes.referencia, UPPER(clientes.id_servicio) as id_servicio, clientes.ultimo_pago, clientes.precio, clientes.ano, sector.descripcion as sector, 
CASE  
WHEN clientes.id_mes = '1' THEN 'Ene'
WHEN clientes.id_mes = '2' THEN 'Feb'
WHEN clientes.id_mes = '3' THEN 'Mar'
WHEN clientes.id_mes = '4' THEN 'Abr'
WHEN clientes.id_mes = '5' THEN 'May'
WHEN clientes.id_mes = '6' THEN 'Jun'
WHEN clientes.id_mes = '7' THEN 'Jul'
WHEN clientes.id_mes = '8' THEN 'Ago'
WHEN clientes.id_mes = '9' THEN 'Sep'
WHEN clientes.id_mes = '10' THEN 'Oct'
WHEN clientes.id_mes = '11' THEN 'Nov'
WHEN clientes.id_mes = '12' THEN 'Dic'
END AS mes
FROM clientes 
INNER JOIN sector 
ON clientes.id_sector = sector.id_sector
WHERE clientes.estado = 1 && clientes.id_sector = '$id_sector' && clientes.localidad = '$nombre_localidad'  ORDER BY clientes.referencia");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlClientesAtrasados($usuario){

			$stmt = Conexion::conectar()->prepare("SELECT clientes.id as id, clientes.nombre as nombre, mes.nombre as mes, clientes.ano, clientes.telefono as telefono, clientes.NIT as NIT, clientes.referencia as referencia, clientes.localidad as localidad, clientes.id_servicio as servicio, clientes.precio as precio, clientes.ultimo_pago as ultimo_pago, clientes.estado, clientes.observacion, sector.descripcion as sector, area.descripcion as area, clientes.fecha_instalacion, DATEDIFF(NOW(),clientes.ultimo_pago) as dias FROM clientes INNER JOIN area ON clientes.id_area = area.id_area INNER JOIN sector ON clientes.id_sector = sector.id_sector INNER JOIN mes ON clientes.id_mes = mes.id_mes WHERE clientes.estado = '1'  && area.cobrador = '$usuario' && (DATEDIFF(NOW(),clientes.ultimo_pago) >= 40 || DATEDIFF(NOW(),clientes.ultimo_pago) IS NULL) && DATEDIFF(NOW(),clientes.fecha_instalacion) >= 31");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}
	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM tvguates_cobrosnueva.clientes WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  mes.nombre as mes, clientes.ano, clientes.id as id, clientes.nombre as nombre, clientes.telefono as telefono, clientes.NIT as NIT, clientes.referencia as referencia, clientes.localidad as localidad, clientes.id_servicio as servicio, clientes.precio as precio, clientes.ultimo_pago as ultimo_pago, clientes.estado, clientes.observacion, sector.descripcion as sector, area.descripcion as area FROM clientes INNER JOIN area ON clientes.id_area = area.id_area INNER JOIN sector ON clientes.id_sector = sector.id_sector INNER JOIN mes ON clientes.id_mes = mes.id_mes WHERE clientes.estado = '1'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	
	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientesArea($tabla, $area){


			$stmt = Conexion::conectar()->prepare("SELECT  mes.nombre as mes, clientes.ano, clientes.id as id, clientes.nombre as nombre, clientes.telefono as telefono, clientes.NIT as NIT, clientes.referencia as referencia, clientes.localidad as localidad, clientes.id_servicio as servicio, clientes.precio as precio, clientes.ultimo_pago as ultimo_pago, clientes.estado, sector.descripcion as sector, area.descripcion as area FROM clientes INNER JOIN area ON clientes.id_area = area.id_area INNER JOIN sector ON clientes.id_sector = sector.id_sector INNER JOIN mes ON clientes.id_mes = mes.id_mes WHERE area.id_area = '$area' && clientes.estado = '1'");

			$stmt -> execute();

			return $stmt -> fetchAll();


		$stmt -> close();

		$stmt = null;

	}

	
	



}