<?php

 include ("Conexion.php");

 $bd = conectar();

 $idFoto = $_GET['idFoto'];

 $fotoSalon = $bd-> prepare ("SELECT `Is_salon` FROM `imgsalon` where `Is_id` =?");
 $fotoSalon -> bindParam(1,$idFoto);
 $fotoSalon -> execute();

 while ($salon = $fotoSalon -> fetch(PDO::FETCH_ASSOC)){
  $idSalon= $salon['Is_salon'];
 } 
 
 $query = $bd-> prepare ("DELETE from `imgsalon` WHERE `Is_id` = ?");
 $query -> bindParam(1,$idFoto);

 $query-> execute();

 

 header ("Location: Editarsalon.php?SalonId=$idSalon");


?>