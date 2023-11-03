<?php

require_once "conexions.php";

class ModeloUsuarios{
	/*=============================================
	MOSTRAR USUARIOS BY PERFIL
	=============================================*/

	static public function MdlMostrarUsuarioByPerfil($perfil){

		if ($perfil ==null) {
			$stmt = Conexions::conectars()->prepare("SELECT *
													FROM usuario us
													");		
		}else{
			$stmt = Conexions::conectars()->prepare("SELECT us.id_Usuario as id,
us.nombre as nombre,
us.nombre_usuario as usuario,
r.nombre as perfil
FROM usuario us
INNER JOIN usuariorol usr
ON us.id_Usuario=usr.id_Usuario
INNER JOIN rol as r
ON usr.id_Rol=R.id_Rol
WHERE usr.id_Rol=$perfil");
															}

			

			$stmt -> execute();

			return $stmt -> fetchAll();		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlAsignarUsuario($usuario, $sector, $fecha, $userlogin, $ip){
	
		$stmt = Conexions::conectars()->prepare("update asignacion set estado = 10 where id_Sector = '$sector';
				INSERT INTO asignacion(id_Sector, id_Usuario, estado, usuario_Modifica, fecha_Modifica, ip_Modifica) VALUES ('$sector','$usuario','9','$userlogin','$fecha','$ip');");

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT 
s.id_Usuario as idU,
su.nombre_usuario as usuario,
su.nombre as nombre,
su.password as password,
su.estado as estado, 
r.id_Rol as idr,
r.nombre as rol
FROM tvguates_soporte.usuariorol s
LEFT JOIN tvguates_soporte.usuario su 
on s.id_Usuario=su.id_Usuario
LEFT JOIN tvguates_soporte.rol r
on s.id_Rol=r.id_Rol WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
su.id_Usuario as idU,
su.nombre_usuario as usuario,
su.nombre as nombre,
su.estado as estado, 
r.id_Rol as idr,
r.nombre as rol
FROM tvguates_soporte.usuariorol s
RIGHT JOIN tvguates_soporte.usuario su 
on s.id_Usuario=su.id_Usuario
LEFT JOIN tvguates_soporte.rol r
on s.id_Rol=r.id_Rol");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function MdlMostrarSupervisores($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE perfil = 'Supervisor'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){
echo'<script>
console.log("hola mdl")
</script>';
		$stmt = Conexions::conectars()->prepare("INSERT INTO $tabla(nombre, nombre_usuario, password,estado, usuario_Modifica, fecha_Modifica, ip_Modifica) VALUES (:nombre, :usuario, :password, 9, :usuario_modifica, :fecha_modifica, '0.0.0.0');
			");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario_modifica", $datos["usuario_modifica"], PDO::PARAM_STR);		
		$stmt->bindParam(":fecha_modifica", $datos["fecha_modifica"], PDO::PARAM_STR);



		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){
		echo'<script>console.log("'.$tabla. $item1.$valor1. $item2.$valor2.'")</script>';
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}