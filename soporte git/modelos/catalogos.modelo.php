<?php

require_once "conexions.php";

class ModeloCatalogos{


	/*=============================================
	MOSTRAR SERVICIOS
	=============================================*/

	static public function mdlDatosCatalogoByIdCatalogo($catalogo){

			$stmt = Conexions::conectars()->prepare("SELECT * FROM datoscatalogo where id_catalogo = $catalogo");

			$stmt -> execute();

			return $stmt -> fetchAll();

	
		$stmt -> close();

		$stmt = null;

	}

}

