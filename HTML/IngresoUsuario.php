<?php
session_start();
include ("Conexion.php");
include ("Validaciones.php");
include ("libUsuario.php");

$usuario = $_POST["mail"];
$pass = $_POST["pass"];

$base = conectar();
 
$existe= validarUsuario($usuario,$pass,$base);
 
if ($existe == true){
 /* Variables */
 $_SESSION['username']= $usuario;
 $_SESSION['iduser']= obtenerIdUsuario($base,$usuario);


    
 $listaUsuario = obtenerUsuario($base,$_SESSION['iduser']);

    
    
 while ($datosUsuario = $listaUsuario -> fetch(PDO::FETCH_ASSOC)){
  $tipoCuenta= $datosUsuario['Us_perfil'];
  $_SESSION['mail']= $datosUsuario['Us_correo'];
  $_SESSION['TipoCuenta']= $datosUsuario['Us_perfil'];
         
 }

 if ($tipoCuenta == 1) {
 header('Location: Mi-Cuenta-propietario.php');
 } else {
    header('Location: Mi-Cuenta-Usuario.php');
   }  
 } else {
    $errorLogin = 'Error en el ingreso de los datos';
 	include_once('Ingresar.php');
     
   }


 
?>