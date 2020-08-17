<?php
session_start();


 if ($_SESSION['TipoCuenta'] == 1) {
 header('Location: Mi-cuenta-propietario.php');
 } else {
    header('Location: Mi-cuenta-usuario.php');
   }  



 
?>