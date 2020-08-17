<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1">
        <link rel="stylesheet" href="Css/Registarse.css">
        <link rel="stylesheet" href="Css/style.css">
        <link rel="stylesheet" href="fonts/style.css">
        <title>Registrarse</title>
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
     
    
  
         <div id="Formulario-registro-usuario">
            <form action="registro-usuario.php" class="formulario-registro-usuario" id="formulario-registro-usuario" method="post">
                  <div class="wrap">
            <?php 
              if (isset($errorRegistro)) {
               echo "<script language='JavaScript'>alert('Usuario en uso');</script>";
            }?>
            <div class="radio">
                <h2 id="Tipo-de-usuario">Tipo de usuario</h2>

                <input type="radio" name="perfil" id="usuario" value="0" >
                <label for="usuario">Usuario</label>

                <input type="radio" name="perfil" id="propietario" value="1">
                <label for="propietario">Propietario</label>
            </div>


        </div>

                <h1>Formulario de registro</h1>
                <div class="input-group">
                    
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" placeholder="Nombre" required>                    
                    
                    <label for="direccion">Direccion:</label>
                    <input type="text" name="direccion" placeholder="Direccion">                    
            
                    <label for="telefono">Telefono:</label>
                    <input type="text" name="telefono" placeholder="Telefono">                    
            
                    
                    <label for="email">Correo electronico:</label>
                    <input type="email" name="correo" placeholder="Correo electronico" required>                    
         
                     <label for="pass">Contraseña:</label>
                    <input type="password" name="pass" placeholder="Contraseña" required>
                   
       
                    <label for="pass2">Repetir contraseña:</label>
                    <input type="password" placeholder="Repetir contraseña" required>
                    
                    

                    <input type="submit" id="btn-submit" value="Registrarse">
                
                  </div> 
            </form>
    
    </div>
     
 
</body>
</html>
