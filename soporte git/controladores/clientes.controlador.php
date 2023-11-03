<?php

class ControladorClientes{

/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientesBySectorAndLocalidad($id_sector, $nombre_localidad){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientesBySectorAndLocalidad($id_sector, $nombre_localidad);

		return $respuesta;

	}

	

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientesArea($area){

		$tabla = "clientes";

		$respuesta = ModeloClientes::mdlMostrarClientesArea($tabla, $area);

		return $respuesta;

	}


	/*=============================================
	MOSTRAR CLIENTES COBRAR
	=============================================*/

	static public function ctrMostrarClientesCobrar($idCliente){

		$respuesta = ModeloClientes::mdlMostrarClientesCobrar($idCliente);

		return $respuesta;

	}

