<?php 

 

 function listaSalones(&$conexion,&$cantSalones){

  $query= $conexion-> prepare ("select * from salon");
  $query -> execute();
  $cantSalones= $query->rowCount();
  

  return $query;
 }

 function ultimoSalonDeUsuario(&$conexion,$idUsuario){
  $query= $conexion -> prepare("SELECT *  FROM `salon` WHERE `Sa_propietario` = ? AND `Sa_id` = (SELECT MAX(Sa_id) FROM `salon` where `Sa_propietario` = ? )");
  $query -> bindParam(1,$idUsuario);
  $query -> bindParam(2,$idUsuario);
  $query -> execute();

  return $query;
 }

 function salonesDeUsuario(&$conexion, $idUsuario, &$cantSalones){
  $query = $conexion -> prepare("SELECT * FROM `salon` WHERE `Sa_propietario`= ?");
  $query -> bindParam(1,$idUsuario);
  $query -> execute();
  $cantSalones= $query -> rowCount();

  return $query;
 }
 
 function imgSalon(&$conexion,$idSalon){
 	$noHaySalon = 0;
 	
 	$query = $conexion-> prepare ("SELECT * FROM `imgsalon` WHERE `Is_salon`=? LIMIT 1");
 	$query -> bindparam(1,$idSalon);
 	$query -> execute();

 	$resultado = $query -> fetch(PDO::FETCH_ASSOC);
 	$nomb_foto = $resultado['Is_imagen'];
    $haySalon= $query->rowCount();
   
    if ($haySalon !=0 ) {
      $salida = $nomb_foto;

    }else{

     $salida = $noHaySalon;
    }
 	
 	return $salida;
 }

 function insertarSalon(&$conexion, $nombre, $capacidad, $ubicacion, $nro, $ciudad, $barrio, $propietario, $precio, $descripcion){



  $query = $conexion -> prepare ("INSERT INTO `salon`(`Sa_nombre`, `Sa_calle`, `Sa_nroCalle`, `Sa_ciudad`, `Sa_barrio`, `Sa_propietario`, `Sa_capacidad`, `Sa_precio`, `Sa_Descripcion`) VALUES (?,?,?,?,?,?,?,?,?)");
  
  $query -> bindParam(1,$nombre);
  $query -> bindParam(2,$ubicacion);
  $query -> bindParam(3,$nro);
  $query -> bindParam(4,$ciudad);
  $query -> bindParam(5,$barrio);
  $query -> bindParam(6,$propietario);
  $query -> bindParam(7,$capacidad);
  $query -> bindParam(8,$precio);
  $query -> bindParam(9,$descripcion);


  $query-> execute();

 }

 
 function datosSalon(&$conexion,$idSalon){

  $query = $conexion -> prepare("SELECT * FROM `salon` WHERE `Sa_id`=?");
  $query -> bindParam(1,$idSalon);

  $query -> execute();

  return $query;

}

function fotosSalon(&$conexion, $idSalon){
  $query = $conexion -> prepare("SELECT * FROM `imgsalon` WHERE `is_salon`=?");
  $query -> bindParam(1,$idSalon);

  $query -> execute();

  return $query;

}

function sePuedeEliminarSalon(&$conexion,$idSalon){
  $query = $conexion -> prepare("SELECT * FROM `reserva` where `Re_Salon` = ?");
  $query -> bindParam(1,$idSalon);

  $query -> execute();

  $hayReserva= $query->rowCount();


  if ($hayReserva == 0){
    return true;
  } else{
    return false;
  }

}



 ?>
