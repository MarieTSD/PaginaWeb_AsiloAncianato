<?php
   session_start();
   error_reporting(0);
   $serv = 'localhost';
   $cuenta = 'root';
   $contra = '';
   $BaseD = 'ancianato';
   $_SESSION['exito']="";
  //Realiar la conexion con la base de datos 
   $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);
  if($conexion->connect_error){
      die('Ocurrio un error en la conexion con la BD');
  }else{
      //Si entra aqui es que hubo una conexion existosa, Verificamos que haya dado enviar producto
      //Sacamos los valores con post
    
                //obtenemos datos del formulario
                $nom =$_POST['nom'];
                $des =$_POST['desc'];
                $via =$_POST['via'];
                
                
                //hacemos cadena con la sentencia mysql para insertar datos
                $sql = "INSERT INTO medicina (Nombre,Descripcion,Via) 
                    VALUES('$nom','$des','$via')";
                
                //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
                $conexion->query($sql);  
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                    $_SESSION['exito'] = "si";
                    header("Location: altas_medicina.php");
                }else{
                    $_SESSION['exito'] = "no";
                    echo "<script>document.location='altas_medicina.php';</script>";
                }
         
  }
?>