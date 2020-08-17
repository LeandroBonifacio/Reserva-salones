
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1">
        <link rel="stylesheet" href="Css/Mas-Informacion.css">
        <link rel="stylesheet" href="Css/Ingresar.css">
       	<link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="fonts/style.css">
	<link rel="stylesheet" href="css/Estilos.css">
	<link rel="stylesheet" href="css/Menu.css">
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/Reserva.css">
        
        
        <title>Reserva</title>
    </head>
    
    <script >
        function Error(){
            alert("Error");
        }
    
       
    
    
    </script>
    
    
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
   
    <form action="Reserva.php" class="formulario" name="formulario-ingreso" method="POST" style="height: 500px; ">
    <?php 
   
    include ("Conexion.php");

    $bd = conectar();
   
    
          $Idsalon = $_POST['SalonId'];

 
   
         $Datos = $bd->prepare("select * from salon WHERE `Sa_id`= ?");
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
            
   echo '<input type="text" name="SalonId" value='.$Idsalon.' hidden>';
   echo ' <div  class="Descripcion-salon" name="Descripcion-salon" >';       
            echo '<ul>';
            echo '    <label>Nombre:  ' .$Nombre. '</label>';
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
	
        echo '</di>';
     ?>
         <div style="margin-top: 10px; margin-left: 10px; ">
           <div class="radio" >
                
                <input type="radio" name="turno" id="usuario" value="1" >
                <label for="usuario">Mañana</label>

                <input type="radio" name="turno" id="propietario" value="2">
                <label for="propietario">Noche</label>
                </div>
              
           
            
              <input type="date" name="Fecha" required >
           </div>
        <div>
            
        <?php 
            echo'<a class="Reserva" href="Mas-Informacion.php?SalonId='.$Idsalon.' id=btn-submit-elimfoto"  value="Volver"> Volver </a>';
         ?>     
            <input class="Reserva" type="submit" id="btn-submit-reserva" value="Confirmar reserva" name="b2">
            
        
                    
            
            
        </div>
           
      </form> 
   
      
  
        
</body>
</html>