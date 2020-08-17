<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1">
        <link rel="stylesheet" href="Css/style.css">
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="Css/Menu.css">
        <link rel="stylesheet" href="Css/Estilos.css">
        <link rel="stylesheet" href="Css/Carga-de-salones.css">
        
        
        
        <title>Registrar salones</title>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>

        <style type="text/css">

        .main-section{

            margin: auto auto auto auto;

            padding: 10px;

            margin-top: 15px;

            background-color: #fff;

            box-shadow: 0px 0px 20px #c1c1c1;
            
            width: 200px;

        }

        .fileinput-remove,

        .fileinput-upload{

            display: none;
            
            background: black;

        }

    </style>
       
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

            <form action="registro-salon.php" class="formulario-carga" enctype="multipart/form-data" method="post">
          
                <h2>Formulario de carga</h2>
                    
                    <label for="nombre-salon">Nombre salon:</label>
                    <input type="text" name="nombre" placeholder="Nombre" required>                    

                    <label for="capacidad">Capacidad:</label>
                    <input type="text" name="capacidad" placeholder="Capacidad" required>
                
                    <label for="ubicacion">Calle:</label>
                    <input type="text" name="ubicacion" placeholder="Calle" required>

                    <label for="ubicacion">Número:</label>
                    <input type="text" name="ubinro" placeholder="Numero" required>  
                
                    
                    <label for="barrio">Barrio:</label>
                    <input type="text" name="barrio" placeholder="Barrio" required>                    
                    
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" placeholder="Ciudad" required>
                    
                    <label for="precio">Precio:</label>
                    <input type="text" name="precio" placeholder="Precio" required>
                
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" name="descripcion" placeholder="Descripcion" required>
                
                    <label for="imagenes">Fotos:</label>
                    <input type="file" class="form-control" id="fotos" name="fotos[]" size="7" multiple="" required>
                
              
                
                 
                    <input type="submit" id="btn-submit" value="Guardar" style="background: grey; color: black;">
                
                   
            </form>
            <!--
    <script src="../Js/main.js">
    
    
    
    </script> -->
     
 
</body>
</html>
