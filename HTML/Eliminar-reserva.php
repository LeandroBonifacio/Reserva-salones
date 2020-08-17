<?php

 include ("Conexion.php");

 $bd = conectar();

 $IdReserva = $_GET['idReserva'];

 $query = $bd-> prepare ("DELETE from `reserva` WHERE `Re_Id` = ?");
 $query -> bindParam(1,$IdReserva);
 $query -> execute();

 header('Location: Mi-cuenta-Usuario.php');


?>