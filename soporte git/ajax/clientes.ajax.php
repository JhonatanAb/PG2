<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

/*=============================================
	ACTIVAR CLIENTE
	=============================================*/	

	public $activarCliente;
	public $activarIdC;


	public function ajaxActivarCliente(){

		$tabla = "clientes";
		
				

		$item1 = "estado";
		$valor1 = $this->activarCliente;

		$item2 = "id";
		$valor2 = $this->activarIdC;

		$respuesta = ModeloClientes::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);

	}


/*=============================================
	COBRAR CLIENTE
	=============================================*/	

	public $idClienteCobrar;

	public function ajaxCobrarCliente(){

		$idCliente = $this->idClienteCobrar;

		$respuesta = ControladorClientes::ctrMostrarClientesCobrar($idCliente);

		echo json_encode($respuesta);


	}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "id";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);


	}

}


/*=============================================
ACTIVAR CLIENTE
=============================================*/	

if(isset($_POST["activarCliente"])){

	$activarCliente = new AjaxClientes();
	$activarCliente -> activarCliente = $_POST["activarCliente"];
	$activarCliente -> activarIdC = $_POST["activarIdC"];
	$activarCliente -> ajaxActivarCliente();

}

if(isset($_POST["idClienteCobrar"])){

	$clienteCobrar = new AjaxClientes();
	$clienteCobrar -> idClienteCobrar = $_POST["idClienteCobrar"];
	$clienteCobrar -> ajaxCobrarCliente();

}
/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarCliente();

}