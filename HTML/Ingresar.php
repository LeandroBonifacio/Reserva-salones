
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1">
        <link rel="stylesheet" href="Css/Ingresar.css">
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Ingresar</title>
    </head>
    
    <script >
        function Error(){
            alert("Error");
        }
    
       
    
    
    </script>
    
    
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
   <div class="Login-box">
       <h1>Ingrese su cuenta:</h1>
      
        <form action="IngresoUsuario.php" class="formulario" name="formulario-ingreso" method="POST">
             <?php 
              if (isset($errorLogin)) {
               echo "<script language='JavaScript'>alert('Usuario Incorrecto');</script>";
            }?>
            <div>

                <div class="input-group">
                    
                    <label  for="username">Correo electronico:</label>
                    <input name= "mail" type="email" placeholder="Correo electronico" required>
              
                    <label  for="password">Contraseña:</label>
                    <input name="pass" type="password" placeholder="Contraseña" required>
                </div>


                <input type="submit" id="btn-submit" value="Ingresar" >
                
                
				
            </div>  
   
       </form>
    
     
     
    </div> 
    
  
        
</body>
</html>