<?php 
session_start();
require_once "../modelos/solicitud.modelo.php";

$usuario = $_SESSION["usuario"];
$idSol = $_POST["idSol"];
$estado = $_POST["estado"];
$observacion = $_POST["observacion"];

date_default_timezone_set('America/Guatemala');
$fecha = date('Y-m-d');
$hora = date('H:i:s');
$fechaActual = $fecha.' '.$hora;

echo $result = ModeloSolicitud::mdlFinalizarSolicitud($idSol, $estado, $fecha, $observacion, $usuario);
 ?>
