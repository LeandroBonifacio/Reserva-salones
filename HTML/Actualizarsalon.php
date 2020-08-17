<?php
 session_start();
 include_once("Conexion.php");
 $bd=conectar();

 $idSalon= $_POST['Salon'];

 $query = $bd->prepare("UPDATE `salon` SET 
 	`Sa_nombre`=?
 	,`Sa_calle`=?
 	,`Sa_nroCalle`=?
 	,`Sa_ciudad`=?
 	,`Sa_barrio`=?
 	,`Sa_propietario`=?
 	,`Sa_capacidad`=?
 	,`Sa_precio`=?
 	,`Sa_Descripcion`=?
 	  WHERE `Sa_id`=?");

 $query -> bindParam(1,$_POST['nombre']);
 $query -> bindParam(2,$_POST['ubicacion']);
 $query -> bindParam(3,$_POST['ubinro']);
 $query -> bindParam(4,$_POST['ciudad']);
 $query -> bindParam(5,$_POST['barrio']);
 $query -> bindParam(6,$_SESSION['iduser']);
 $query -> bindParam(7,$_POST['capacidad']);
 $query -> bindParam(8,$_POST['precio']);
 $query -> bindParam(9,$_POST['descripcion']);
 $query -> bindParam(10,$_POST['Salon']);

 $query -> execute();




 //RUTA DE CARGA DE IMAGENES EN EL SERVIDOR
 $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/Web(EDI)/img/';
 
 foreach ($_FILES['fotos']['tmp_name'] as $key => $tmp_name) {
  $nombre_imagen= $_FILES['fotos']['name'][$key];
  $tipo_imagen=$_FILES['fotos']['type'][$key];
  $tamano_imagen=$_FILES['fotos']['size'][$key];

  if ($tamano_imagen <= 10000000) {
   if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif") {
    //Cumple todo los requisitos, guardo en la carpeta y registro en la bd	
 	move_uploaded_file($_FILES['fotos']['tmp_name'][$key], $carpeta_destino.$nombre_imagen);
    $query = $bd-> prepare("insert into `imgsalon` (`Is_salon`,`Is_imagen`) values (?,?)");
    $query-> bindParam(1,$idSalon);
    $query-> bindparam(2,$nombre_imagen);
    $query-> execute();
    }else{
   	echo "Formatos permitidos : .jpeg, .jpg, .gif, .png";
    } //end if tipo_imagen

   }else{
   echo "La imagen es mas pesada de lo permitido";
   } //enf if tamaño_imagen
 

} //end foreach




header ("Location: Mi-Cuenta-propietario");



?>