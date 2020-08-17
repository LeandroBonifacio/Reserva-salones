<?php 
   
    include("Conexion.php");

session_start();

$bd = conectar();
   
$Idsalon = $_POST['SalonId'];
$Turno = $_POST['turno'];
$Fecha = $_POST['Fecha'];
$Usuario = $_SESSION['iduser'];



 $Turnos = $bd -> prepare("SELECT * FROM `reserva` WHERE `Re_Salon`=? and `Re_turno`=? and `Re_fecha`=?");
          $Turnos -> bindParam(1,$Idsalon);
          $Turnos -> bindParam(2,$Turno);
          $Turnos -> bindParam(3,$Fecha);
          $Turnos -> execute(); 

 
    $contador = $Turnos -> rowCount();

 	if ($contador >= 1) {
 	 
     
        
        echo "<script language='JavaScript'>alert('Horario y dia del salon reservados');</script>";
        header('GaleriaSalones.php');
        
        } 
    else {
       $query = $bd -> prepare("INSERT INTO `reserva`(`Re_turno`, `Re_usuario` ,`Re_Salon`, `Re_fecha`) VALUES (?,?,?,?)");


       $query -> bindParam (1,$Turno);
       $query -> bindParam (2,$Usuario);
       $query -> bindParam (3,$Idsalon);
       $query -> bindParam (4,$Fecha);

       $query -> execute();
        
        header('Location: GaleriaSalones.php');
        
     }
       
      
