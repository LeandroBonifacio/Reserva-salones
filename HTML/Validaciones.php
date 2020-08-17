
<?php
 
 function existeUsuario(&$conexion, $mail){
 	$query = $conexion -> prepare ("SELECT * from usuario where Us_correo = ?");
 	$query -> bindParam(1,$mail);
 	$query -> execute();

 	$contador = $query -> rowCount();

 	if ($contador == 1) {
 	  return true;	
 	} else {
 		return false;
 	}
 

 }


 function validarUsuario($user,$pass,&$conexion){
	
	/*$bd = conectar(); */
	
	$consulta = "select * from usuario where Us_correo = ? and Us_password = ?";
	
	$query = $conexion->prepare($consulta);
	$query -> bindParam(1,$user);
	$query -> bindParam(2,$pass);
	$query -> execute();
	
	$contador = $query->rowCount();
	
	if ($contador == 1){	
	 return true;	 
	} else
	{
	   return false;		
    }	 
 } //fin funcion


?>