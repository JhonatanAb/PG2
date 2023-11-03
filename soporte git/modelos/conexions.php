<?php

class Conexions{

	static public function conectars(){

		$link = new PDO("mysql:host=localhost:3306;dbname=tvguates_soporte",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}
