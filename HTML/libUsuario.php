<?php 

 function obtenerIdUsuario(&$conexion,$mail){
 	$query = $conexion-> prepare("SELECT `Us_id` from `usuario` where `Us_correo`= ? ");
 	$query -> bindParam(1,$mail);
 	$query -> execute();

 	while ($fila = $query -> fetch(PDO::FETCH_ASSOC)){
 		$id = $fila['Us_id'];
 	}

  return $id;
 }


 function insertarUsuario(&$conexion, $nombre, $correo, $pass, $telefono,$direccion, $perfil){

   $query = $conexion -> prepare("INSERT INTO `usuario`(`Us_correo`, `Us_nombre`, `Us_password`, `Us_telefono`, `Us_domicilio`, `Us_perfil`) VALUES (?,?,?,?,?,?)");

   $query -> bindParam (1,$correo);
   $query -> bindParam (2,$nombre);
   $query -> bindParam (3,$pass);
   $query -> bindParam (4,$telefono);
   $query -> bindParam (5,$direccion);
   $query -> bindParam (6,$perfil);

   $query -> execute();
 }


function obtenerUsuario(&$conexion,$idUsuario){
 
  $query = $conexion -> prepare("SELECT * FROM `usuario` WHERE `Us_id` = ?");
  $query -> bindParam(1,$idUsuario);

  $query -> execute();

  return $query;
 }


 ?>