<?php
 include ("Conexion.php");

    $bd = conectar();
       
         $Idsalon = $_POST['SalonId'];

          $Datos = $bd->prepare("select Sa_propietario from salon WHERE `Sa_id`= ?");
          $Datos -> bindParam(1,$Idsalon);
          $Datos -> execute();
    
            while ($Dato = $Datos->fetch()){ 
       
                    $IdPropietario = $Dato['Sa_propietario'];
                        
          }
   
         $Datos = $bd->prepare("select Us_correo from usuario WHERE `Us_id`= ?");
          $Datos -> bindParam(1,$IdPropietario);
          $Datos -> execute();
    
            while ($Dato = $Datos->fetch()){ 
       
                    $emaildestino = $Dato['Us_correo'];
                   
                        
          }
            

  
    
if (isset($_POST['Boton']) ){
    if (!empty($_POST['nombre']) && !empty($_POST['asunto']) && !empty($_POST['mensaje']) ){
     
    $nombre = $_post["nombre"];
    $asunto = $_post["asunto"];
    $mensaje = $_post["mensaje"];  
        
    $header = "From: noreply@example.com"."\r\n";
    $header.= "Reply-To: noreply@example.com"."\r\n";
    $header.= "X-Mailer: PHP/". phpversion();
        
    $mail = @mail($emaildestino, $asunto, $mensaje, $header);
        if ($mail){
            echo'<h4> Mail enviado con exito!!! </h4>';
            echo'<h4>' .$nombre. '</h4>';
            echo'<h4>' .$asunto. '</h4>';
            echo'<h4>' .$mensaje. '</h4>';
            
        }
        
        
    }
} 
    

?>