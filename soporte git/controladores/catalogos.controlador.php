<?php

class ControladorCatalogos{


	/*=============================================
	MOSTRAR CATALOGO
	=============================================*/

	static public function ctrDatosCatalogoByIdCatalogo($catalogo){

		$respuesta = ModeloCatalogos::mdlDatosCatalogoByIdCatalogo($catalogo);

		return $respuesta;
	
	}


}
