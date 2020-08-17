
<!DOCTYPE html>
<html>
<head>
	<title>Reserva de salones de fiestas</title>
	<meta charset="utf-8">
	<meta charset="utf-8">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="fonts/style.css">
	<link rel="stylesheet" href="Css/Estilos.css">
	<link rel="stylesheet" href="Css/Menu.css">
    <link rel="stylesheet" href="Css/Banner.css">
	
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
               
        
        <main>
            <section id="banner">
                <img src="../Img/salon1.jpeg"> 
                <div class="Contenedor">   
                    <h2> Comparti un momento soñado en el mejor lugar</h2>
                    <p>Elegi el salon de tus sueños</p>
                </div>
                
   
                
                
                
            </section>
            
            <section id="Nosotros">   
                   
                    
            </section>
            
            <section id="blog">   
                    <h2></h2>
                    <p> 
                    </p>
            </section>
            
        </main>
    <!--<footer> 
        <div class="container-body">
            <div class="Column1">
                <h1>Mas informacion de nuestra compañia</h1>
                <p>La página web facilitará la reserva y consulta de salones de fiestas en la ciudad de Bahía Blanca. Así como también un contacto directo con los propietarios de los mismo. También un dueño de un salón podrá promocionar su salón dando todos los datos para que pueda ser reservado. </p>
             </div>
            
            <div class="Column2">
                <h1>Redes sociales</h1>
                <div class="row">
                    <img src="">
                    <label>Siguenos en Facebook</label>
                </div>
                
                <div class="row">
                    <img src="">
                    <label>Siguenos en Twiter</label>
                </div>
                
                <div class="row">
                    <img src="">
                    <label>Siguenos en Intagrar</label>
                </div>
                
                <div class="row">
                    <img src="">
                    <label>Siguenos en GooglePlus</label>
                </div>
            
                
             </div>
           

        </div> 
        <div class="container-footer">
            <div class="copyrigth"></div>
             
        
        </div>
    </footer>-->

</body>
</html>

