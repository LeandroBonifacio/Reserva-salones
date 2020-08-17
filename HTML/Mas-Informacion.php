

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta charset="utf-8">
    <link rel="stylesheet" href="Css/style.css">
        <link rel="stylesheet" href="fonts/style.css">
	<link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="fonts/style.css">
	<link rel="stylesheet" href="css/Estilos.css">
	<link rel="stylesheet" href="css/Menu.css">
    <link rel="stylesheet" href="Css/Mas-Informacion.css">
    
    
    <title>Informacion</title>
    
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
                
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <title>Salones</title>
        <script>
            $(function(){
              $('.slider').bxSlider({
                mode: 'horizontal',
                captions: false,
                slideWidth: 1400,
                slideHeight: 60
              });
            });
          </script>  
    
 
	
</head>
<body>

<?php   
    session_start();
        
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
    
	     
 <?php
  include ("Conexion.php");

  $bd = conectar();

  //Datos salon
 
  $Idsalon = $_GET['SalonId'];
 
   
  $Datos = $bd-> prepare("select * from salon WHERE `Sa_id`= ?");
          $Datos -> bindParam(1,$Idsalon);
          $Datos -> execute();
    
   while ($Dato = $Datos->fetch()){ 
       
                    $Idsalon = $Dato['Sa_id'];
                    $Nombre = $Dato['Sa_nombre'];
                    $Capacidad = $Dato['Sa_capacidad'];
                    $Calle = $Dato['Sa_calle'];
                    $NroCalle = $Dato['Sa_nroCalle'];
                    $Barrio = $Dato['Sa_barrio'];
                    $Ciudad = $Dato['Sa_ciudad'];
                    $Calle = $Dato['Sa_calle'];
                    $Descripcion = $Dato['Sa_Descripcion'];
                    $Precio = $Dato['Sa_precio'];
                        
          }
           
         echo ' <div class="Titulo">';
          echo '  <h1>'.$Nombre.'</h1>';
       echo ' </div>';
    
          $Fotos = $bd -> prepare("SELECT * FROM `imgsalon` WHERE `is_salon`= ?");
          $Fotos -> bindParam(1,$Idsalon);
          $Fotos -> execute(); 
             
          
            echo ' <li>';
             echo '<form action="Formulario-de-reserva.php" class="Form-grande" method="post">';
            echo ' <div style="display: none">';
             echo '<input type="text" name="SalonId" value='.$Idsalon.' hidden>';   
    echo ' </div>';

            echo '<div class="slider" >'; 
            
               
             while ($Foto = $Fotos->fetch()){  
            
                    echo ' <img src=../Img/'.$Foto['Is_imagen'].' alt="">';            
        
            
          }
           echo ' </div>';
 
           echo '<div  class="Descripcion-salon" name="Descripcion-salon" >';
    
        
            echo '<ul>';
           echo ' <a href="https://www.google.com.ar/maps/place/Av.+'.$Calle.'+'.$NroCalle.',+Bah%C3%ADa+Blanca,+Buenos+Aires/@-38.7144164,-62.2627311,17z/data=!3m1!4b1!4m5!3m4!1s0x95eda352e57190d3:0x3a7ebd29f4cfa6d0!8m2!3d-38.7144206!4d-62.2605424?hl=es" target="_blank"> <label class="Ubicacion">Ubicacion: '.$Calle.' '.$NroCalle.' </label></a>' ;
            echo '</ul>';
            echo '<ul>';
            echo '    <label>Capacidad:  ' .$Capacidad. '</label>';
            echo '</ul>';
            echo '<ul>';
            echo '    <label>Barrio:  '.$Barrio.'</label>';
            echo '</ul>';
            echo '<ul>';
            echo '    <label>Ciudad:  '.$Ciudad.'</label>';
            echo '</ul>';
            echo '<ul>';
            echo '    <label>Descripcion:  '.$Descripcion.'</label>';
            echo '</ul>';
            echo '<ul>';
            echo '    <label>Precio:  '.$Precio.'</label>';
            echo '</ul>';
            
           echo'<a class="Reserva" href="GaleriaSalones.php?SalonId='.$Idsalon.' id=btn-submit-elimfoto"  value="Volver"> Volver </a>';
    
   
   
    
    if(empty($_SESSION['iduser'])){
           echo '<input class="Reserva" type="submit" id="btn-submit-reserva" value="Reserva" name="b2" style="display: none">';
         
    }
    else if($_SESSION['TipoCuenta']){
         echo '<input class="Reserva" type="submit" id="btn-submit-reserva" value="Reserva" name="b2" style="display: none">';
         
        
    } else {
         echo '<input class="Reserva" type="submit" id="btn-submit-reserva" value="Reserva" name="b2">';
        
    }
   echo '</div> ';
   echo '</form> ';
   

    
        
 ?>
   

   </body>
</html>
