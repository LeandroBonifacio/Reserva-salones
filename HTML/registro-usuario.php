<?php 
 include ("Conexion.php");
 include ("Validaciones.php");
 include ("libUsuario.php");

 $bd = conectar();

 $correo = $_POST['correo'];
 $nombre = $_POST['nombre'];
 $telefono = $_POST['telefono'];
 $direccion = $_POST['direccion'];
 $password = $_POST['pass'];
 $perfil = $_POST['perfil'];

 $existe_usuario = existeUsuario($bd, $correo);

 if ($existe_usuario == false) {
   $altaUsuario = insertarUsuario($bd,$nombre,$correo,$password,$telefono,$direccion, $perfil);
   include_once('Ingresar.php');

 } else {
 	$errorRegistro = "Ese usuario ya esta en uso";
 	include_once("Registrarse.php");
 }



 ?>