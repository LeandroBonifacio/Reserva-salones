<?php
 include_once("Conexion.php");
$bd = conectar();

$query = $bd -> prepare("DELETE FROM `imgsalon` WHERE `Is_salon` = ?");
$query -> bindParam(1,$_GET['SalonId']);
$query -> execute();

$query = $bd -> prepare("DELETE FROM `salon` WHERE `Sa_id` = ?");
$query -> bindParam(1,$_GET['SalonId']);
$query -> execute();

header ("Location: Mi-Cuenta-propietario");


?>