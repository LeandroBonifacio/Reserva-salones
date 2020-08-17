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
        
        
        
        <title>Editar salón</title>
        
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
            echo' <a href="Mi-Cuenta.php" style="display: none"><span class="icon-user" > </span>Mi cuenta</a> ';
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
            echo' <a href="Mi-Cuenta-propietario.php"><span class="icon-user" > </span>Mi cuenta</a> ';
            echo'<a href="Cerrar-sesion.php"><span class="icon-back"></span> Cerrar sesion</a> ';  
                   
            echo'</nav>';

		    echo'</div>';       
            echo'</header>';

		  

	     
        }	
        
        
      echo '  <form action="Actualizarsalon.php" name="formGeneral" class="formulario-carga" enctype="multipart/form-data" method="post">';

        echo ' <h2>Datos del salón</h2>';
               
        include ("libSalones.php");
        include ("Conexion.php");

        $bd=conectar();
        $idSalon = $_GET['SalonId'];
        $salon = datosSalon($bd,$idSalon);

                 
        while ($datos = $salon -> fetch(PDO::FETCH_ASSOC)){     
          echo'  <label for="nombre-salon">Nombre salon:</label>';
          echo' <input type="text" name="Salon" value='.$idSalon.' hidden>';

          echo'  <input type="text" name="nombre" placeholder="Nombre" value="'.$datos['Sa_nombre'].'"" required>';
          echo'   <label for="capacidad">Capacidad:</label>';
          echo'   <input type="text" name="capacidad" placeholder="Capacidad" value='.$datos['Sa_capacidad'].' required>';
                
          echo'   <label for="ubicacion">Calle:</label>';
          echo'   <input type="text" name="ubicacion" placeholder="Calle" value="'.$datos['Sa_calle'].'"" required>';

          echo'   <label for="ubicacion">Número:</label>';
          echo'   <input type="text" name="ubinro" placeholder="Numero" value='.$datos['Sa_nroCalle'].' required>';  
                          
          echo'    <label for="barrio">Barrio:</label>';
          echo'    <input type="text" name="barrio" placeholder="Barrio" value="'.$datos['Sa_barrio'].'"" required>';
                    
          echo'    <label for="ciudad">Ciudad:</label>';
          echo'    <input type="text" name="ciudad" placeholder="Ciudad" value="'.$datos['Sa_ciudad'].'"" required>';

          echo' <label for="precio">Precio:</label>';
          echo' <input type="text" name="precio" placeholder="Precio" value="'.$datos['Sa_precio'].'"" required>'; 

          echo' <label for="descripcion">Descripcion:</label>';
          echo' <input type="text" name="descripcion" placeholder="Descripcion" value="'.$datos['Sa_Descripcion'].'"" required>';

          echo'<label for="imagenes">Agregar fotos:</label>';
          echo'<input type="file" class="form-control" id="fotos" name="fotos[]" size="7" multiple="" >';
              
          echo'<input type="submit" id="btn-submit" value="Guardar" style="background: grey; color: black;>';
          
        }
               
          
        echo '</form>';      

     
    
        echo 'Fotos cargadas';
        echo '<form  name="formFoto" method="post">';

        $listaFotos = fotosSalon($bd,$_GET['SalonId']);

        while ($foto = $listaFotos -> fetch(PDO::FETCH_ASSOC)){
         
         echo '<div> <img src="../img/'.$foto['Is_imagen'].'" width="150px" height="150px"/> </div>';
         echo '<input type="text" name="fotoId" value='.$foto['Is_id'].' hidden>';
         echo '<a href="eliminar-foto.php?idFoto='.$foto['Is_id'].'" id="btn-submit-elimfoto" value="Eliminar foto"> Borrar foto </a></label> </div>';
         
         
     }

        echo '</form>';                 
       ?>
    
         
           
 
</body>
</html>