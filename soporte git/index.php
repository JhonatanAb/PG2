<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/area.controlador.php";
require_once "controladores/catalogos.controlador.php";
require_once "controladores/solicitud.controlador.php";
require_once "controladores/sectores.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/area.modelo.php";
require_once "modelos/catalogos.modelo.php";
require_once "modelos/solicitud.modelo.php";
require_once "modelos/sectores.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();