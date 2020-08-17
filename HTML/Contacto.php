<!DOCTYPE html>
<html>
<head>
	<title>Contacto</title>
	<meta charset="utf-8">
	<meta charset="utf-8">
	<link rel="stylesheet" href="fonts/style.css">
	<link rel="stylesheet" href="css/Estilos.css">
	<link rel="stylesheet" href="Css/Menu.css">
    <link rel="stylesheet" href="Css/Banner.css">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/Contacto.css">
	
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
     
    <form action="enviar.php" method="post" >
        <h2>Contacto</h2>
         <?php   
    
         $Idsalon = $_POST['SalonId'];

        
        echo '<input type="text" name="SalonId" value='.$Idsalon.' hidden>';
        ?>
        <input type="text" id="nombre" placeholder="Nombre" required>
        <input type="text" id="asunto" placeholder="Asunto" required>
        <textarea id="mensaje" placeholder="Escriba aqui su mensaje" required></textarea>
        <input type="submit" value="Enviar" name="Boton" >
    </form>

        
</body>
</html>