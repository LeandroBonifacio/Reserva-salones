<?php 
  session_start();

  include ("Conexion.php");
  include ("libSalones.php");

  $bd = conectar();

  //Datos salon
  $nombre = $_POST['nombre'];
  $calle = $_POST['ubicacion'];
  $nro = $_POST['ubinro'];
  $capacidad = $_POST['capacidad'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $barrio = $_POST['barrio'];
  $ciudad = $_POST['ciudad'];
  $propietario = $_SESSION['iduser'];

  
  $insertar = insertarSalon($bd,$nombre,$capacidad, $calle, $nro, $ciudad, $barrio, $propietario, $precio, $descripcion);

  include ("datosimagen.php");
  

 ?>