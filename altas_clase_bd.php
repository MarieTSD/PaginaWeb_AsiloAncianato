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
               
                $des =$_POST['desc'];
                $area =$_POST['area'];
                $idE =$_POST['idE'];
               
                $sql3="select ID from empleado where ID='$idE'";
                $conexion->query($sql3);
                if($conexion->affected_rows>=1){
                    //hacemos cadena con la sentencia mysql para insertar datos
                    $sql = "insert into clase (Descripcion,Area,ID_Empledao) values('$des','$area', '$idE')";
                
                //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
                $conexion->query($sql);  
                    if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                        $_SESSION['exito'] = "si";
                        header("Location: altas_clase.php");
                    }else{
                        $_SESSION['exito'] = "no";
                        echo "<script>document.location='altas_clase.php';</script>";
                    }
                }else{
                    echo '<script>swal("ID de empleado incorrecto", "El id no existe", "error");</script>';


                }
                
         
  }
?>