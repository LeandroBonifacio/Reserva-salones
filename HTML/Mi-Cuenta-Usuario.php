<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta charset="utf-8">
	<link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="fonts/style.css">
	<link rel="stylesheet" href="css/Estilos.css">
	<link rel="stylesheet" href="css/Menu.css">
    <link rel="stylesheet" href="css/Mi-cuenta-usuario.css">
    
    <title>Mi cuenta</title>
    
   
	
</head>
<body>
    	  <?php   
    if(empty($_SESSION['iduser'])){  
                
            echo'<header>';            
            echo'<div class="contenedor-header">';
			echo'<h1> <span class="icon-star"></span> Salones </h1>';
			echo'<input type="checkbox" id="menu-bar">';
			echo'<label class="icon-menu" for="menu-bar"></label>';
			echo'<nav class="menu">';
            echo'<a href="Index.php"><span class="icon-home"></span> Inicio</a>';
            echo'<a href="GaleriaSalones.html"><span class="icon-gift"></span> Salones</a>';
		    echo'<a href="Ingresar.php" ><span class="icon-login"></span>  Ingresar</a>';
            echo'<a href="Registrarse.php"><span class="icon-add-user"> </span>Registrarse</a> ';
            echo' <a href="Cuenta.php" style="display: none"><span class="icon-user" > </span>Mi cuenta</a> ';
            echo'<a href="Cerrar-sesion.php" style="display: none"><span class="icon-back"></span> Cerrar sesion</a> ';  
                   
			 echo'</nav>';

		  echo'</div>';       
        echo'</header>';
           
        
        } 
        elseif (!empty($_SESSION['iduser'])){
    
            
            echo'<header>';            
            echo'<div class="contenedor-header">';
			echo'<h1> <span class="icon-star"></span> Salones </h1>';
			echo'<input type="checkbox" id="menu-bar">';
			echo'<label class="icon-menu" for="menu-bar"></label>';
			echo'<nav class="menu">';
            echo'<a href="Index.php"><span class="icon-home"></span> Inicio</a>';
            echo'<a href="GaleriaSalones.php"><span class="icon-gift"></span> Salones</a>';
		    echo'<a href="Ingresar.php" style="display: none"><span class="icon-login"></span>  Ingresar</a>';
            echo'<a href="Registrarse.php" style="display: none"><span class="icon-add-user"> </span>Registrarse</a> ';
            echo' <a href="Cuenta.php"><span class="icon-user" > </span>Mi cuenta</a> ';
            echo'<a href="Cerrar-sesion.php"><span class="icon-back"></span> Cerrar sesion</a> ';  
                   
            echo'</nav>';

		    echo'</div>';       
            echo'</header>';

		      
	     
        }
    ?>

    <Div class="Cuenta-Propietario-Usuario" margin-top="30px" >
        
    <h1 align="center">Listado de Reservas</h1>
    <table  border="1px"  >

    <tr align="center"; font-weight="bold">
        <td>Nombre del salon</td>
        <td>Fecha</td>
        <td>Direccion</td>
        <td>Turno</td>

        
    </tr>
    <?php
       
         include ("Conexion.php");
           
             $bd = conectar();

                                      
               $Usuario = $_SESSION['iduser'];



                $Reservas = $bd -> prepare("SELECT  Re_Id, Re_turno, Re_Fecha, Sa_nombre, Tu_descripcion, Sa_calle, Sa_nroCalle FROM `reserva` inner join salon on salon.Sa_id=reserva.Re_Salon inner join turno on turno.Tu_id=reserva.Re_turno  WHERE `Re_usuario`=?");
                $Reservas -> bindParam(1,$Usuario);
                $Reservas -> execute(); 
                                        
                      while ($Reserva = $Reservas->fetch()){ 
       
                             
                          $IdReserva = $Reserva['Re_Id'];   
                          $Turno = $Reserva['Re_turno'];
                             $Fecha = $Reserva['Re_Fecha'];
                             $NombreSalon = $Reserva['Sa_nombre'];
                             $Calle = $Reserva['Sa_calle'];
                             $NroCalle = $Reserva['Sa_nroCalle'];
                             $Turno = $Reserva['Tu_descripcion'];
                          
                                       
    
          
                      
               
                    echo' <tr>';
                            echo'<td>'.$NombreSalon.'</td>'; 
                            echo'<td>'.$Fecha.'</td>';
                            echo'<td>'.$Calle." ".$NroCalle.'</td>';
                            echo'<td>'.utf8_encode($Turno).'</td>';
                          echo'<td><a href="Eliminar-reserva.php?idReserva='.$IdReserva.'" id="btn-submit-elimfoto" value="Eliminar foto"> Borrar reserva </a></label> </td>';
                    echo' </tr>';
                 
          
                        
               
           }
                    
             

                        
       
        
        ?>
            
        </table>    
    </Div>    

   </body>
</html>
