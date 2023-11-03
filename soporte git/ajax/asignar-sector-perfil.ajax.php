<?php 
session_start();
require_once "../modelos/usuarios.modelo.php";

$userlogin = $_SESSION["usuario"];
$usuario = $_POST["user"];
$sector = $_POST["sector"];
$ip = "127.0.0.1";

date_default_timezone_set('America/Guatemala');
$fecha = date('Y-m-d');
$hora = date('H:i:s');
$fechaActual = $fecha.' '.$hora;

echo $result = ModeloUsuarios::mdlAsignarUsuario($usuario, $sector, $fecha, $userlogin, $ip);
 ?>