
        
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1">
        <link rel="stylesheet" href="Css/style.css">
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="Css/GaleriaSalones.css">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
                
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <title>Salones</title>
        <script>
            $(function(){
              $('.slider').bxSlider({
                mode: 'horizontal',
                captions: false,
                slideWidth: 300,
                slideHeight:30
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
    
    <div id="galeria-salones">
    <h1> Galeria de salones </h1>
        
        
            
             
   </div>

   <div class="Contenedor">     
       <ul class="Listado-salones">  
         
        
            <?php
         include ("Conexion.php");
         include ("libSalones.php");
         $bd = conectar();
         $cantSalones = 0;

         $Salones = $bd->query("SELECT Sa_id, Sa_nombre, Sa_Ciudad, Sa_barrio FROM salon order by Sa_id DESC");

         while ($Salon = $Salones->fetch()){
        
          $Fotos = $bd -> prepare("SELECT * FROM `imgsalon` WHERE `is_salon`= ?");
          $Fotos -> bindParam(1,$Salon['Sa_id']);
          $Fotos -> execute(); 
             
          
            echo ' <li>';
             echo '<form action="Mas-Informacion.php" class="Form-grande" method="GET">';
             
             echo '<input type="text" name="SalonId" value='.$Salon['Sa_id'].' hidden>';  
            
            echo '<div class="slider" >'; 
               
             while ($Foto = $Fotos->fetch()){  
            
                    echo ' <img src=../Img/'.$Foto['Is_imagen'].' alt="">';            
        
            
          }
            
            echo '</div>';
             echo '<div class="Label-salon">';
                         echo '<label>' .$Salon['Sa_nombre'].'</label>';
             echo '</div>';
             echo '<div class="Label-salon">';
                         echo '<label>' .$Salon['Sa_Ciudad'].'</label>';
             echo '</div>';     
             echo '<div class="Label-salon">';
                        echo '<label>' .$Salon['Sa_barrio'].'</label>';
                      echo '</div>';
               echo '<input type="submit" class="Mas-informacion" value="Mas informacion">';
              echo '</form> ';
             echo ' </li> ';
         }
        ?>
         
       </ul>
    </div>
    
    
</body>
</html>