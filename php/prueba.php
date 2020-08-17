<?php
session_start();
include ("Conexion.php");
include ("Validaciones.php");


$usuario = $_POST["mail"];
$pass = $_POST["pass"];

$base = conectar();
 
$existe= validarUsuario($usuario,$pass,$base);
 
if ($existe == true){
 /* Variables */
 $_SESSION['username']= $usuario;
 header('Location: Contacto.html');
 } else {
   session_destroy();
   header('Location: Ingresar.html');
   
 }


 
?>