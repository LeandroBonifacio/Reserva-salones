<?php   
   session_start();        
  ?>
  
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta charset="utf-8">
	<link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="fonts/style.css">
	<link rel="stylesheet" href="css/Estilos.css">
	<link rel="stylesheet" href="css/Menu.css">
    <link rel="stylesheet" href="css/Mi-Cuenta.css">
    
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
            echo'<a href="GaleriaSalones.php"><span class="icon-gift"></span> Salones</a>';
		    echo'<a href="Ingresar.php" ><span class="icon-login"></span>  Ingresar</a>';
            echo'<a href="Registrarse.html"><span class="icon-add-user"> </span>Registrarse</a> ';
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
            echo'<a href="Registrarse.html" style="display: none"><span class="icon-add-user"> </span>Registrarse</a> ';
            echo' <a href="Cuenta.php"><span class="icon-user" > </span>Mi cuenta</a> ';
            echo'<a href="Cerrar-sesion.php"><span class="icon-back"></span> Cerrar sesion</a> ';  
                   
            echo'</nav>';

		    echo'</div>';       
            echo'</header>';

		      
	     
        }
?>
           
      
    
     <Div class="Cuenta-Propietario" >
        
        <a href="Carga-de-salones.php" class="Agregar-salon"> Agregar salon  </a>    
        <a href="Reservas-de-un-salon.php" class="Reservas"> Reservas  </a>    
        
        <?php
         include ("Conexion.php");
         include ("libSalones.php");
         $bd = conectar();
         $cantSalones = 0;

         $lista= salonesDeUsuario($bd,$_SESSION['iduser'],$cantSalones);

         while ($salon = $lista -> fetch(PDO::FETCH_ASSOC)){
          $foto = imgSalon($bd, $salon['Sa_id']);
          echo '<form action="" method="get">';
          echo '<div class="Salones-propietario"> ';
          
          echo '<input type="text" name="SalonId" value='.$salon['Sa_id'].' hidden>';

          echo '<span class="icon-home"> ';
          echo '<input type="submit" id="btn-submit-editar" value="Editar" onclick= this.form.action="Editarsalon.php"> </span>';

          $sePuedeEliminar = sePuedeEliminarSalon($bd,$salon['Sa_id']);

          if ($sePuedeEliminar == true){
          echo '<input type="submit" value="Eliminar" onclick= this.form.action="Eliminarsalon.php"> </span>';
          }
          
          echo '<label>'.$salon['Sa_nombre'].'</label>';
          echo '<br>';
          echo ' <img src="../Img/'.$foto.'" alt="">';
          echo '<br>';
          echo '<label> Capacidad: '.$salon['Sa_capacidad'].' </label>';
          echo '<br>';
          echo '<label> Dirección: '.$salon['Sa_calle'].' '.$salon['Sa_nroCalle'].' </label>';
          
          echo '</div>';
          echo '</form>';
          
         }
        ?>

       
        
        
            
    </Div>    

   </body>
</html>
