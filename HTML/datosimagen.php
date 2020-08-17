<?php
 //script para subir imagenes
 // 'imagen' porque asi se llama el boton de la html

 
 //RUTA DE CARGA DE IMAGENES EN EL SERVIDOR
 $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/Web(EDI)/img/';
 
 //MOVEMOS LA IMAGEN DEL DIRECTORIO TEMPORAL AL DIRECTORIO EN EL SERVER
 /*
 
 ECHO $carpeta_destino;
 ECHO $carpeta_destino.$nombre_imagen;

 echo $tipo_imagen." ".$tamano_imagen;
 echo "<br>";*/


 $conexion = conectar();
 

 foreach ($_FILES['fotos']['tmp_name'] as $key => $tmp_name) {
 
 
  $nombre_imagen= $_FILES['fotos']['name'][$key];
  $tipo_imagen=$_FILES['fotos']['type'][$key];
  $tamano_imagen=$_FILES['fotos']['size'][$key];

  echo $nombre_imagen;

 if ($tamano_imagen <= 10000000) {
  if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif") {
  
  //Cumple todo los requisitos, guardo en la carpeta y registro en la bd	
 	move_uploaded_file($_FILES['fotos']['tmp_name'][$key], $carpeta_destino.$nombre_imagen);

  $qUltSalon = ultimoSalonDeUsuario($conexion,$_SESSION['iduser']);

  while ($Salon = $qUltSalon -> fetch(PDO::FETCH_ASSOC)){
    $idSalon = $Salon['Sa_id'];
  }

  $query = $conexion-> prepare("insert into `imgsalon` (`Is_salon`,`Is_imagen`) values (?,?)");
  
  $query-> bindParam(1,$idSalon);
  $query-> bindparam(2,$nombre_imagen);
  

  $query-> execute();


   }else{
   	echo "Formatos permitidos : .jpeg, .jpg, .gif, .png";
    } //end if tipo_imagen

 }else{
   echo "La imagen es mas pesada de lo permitido";
   } //enf if tamaño_imagen
 
 //FUNCIONO EL SCRIPT -- FIJARSE QUE LA CARPETA PERMITA SER MODIFICADA Y ESCRIBIR.

}

 header('location:Carga-de-salones.php');

?>