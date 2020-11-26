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
                $id = $_POST['idA'];
                $nom =$_POST['nomA'];
                $apM =$_POST['amA'];
                $apP =$_POST['apA'];
                $anoN = $_POST['anoNA'];
                $paren=$_POST['Par'];
                $calleNo = $_POST['calleA'];
                $colonia = $_POST['coloniaA'];
                $cp = $_POST['cpA'];
                $ciudad = $_POST['ciudadA'];
                $estado = $_POST['estadoA'];
                $tel = $_POST['telA'];
                $idR=$_POST['idR'];
                
                //hacemos cadena con la sentencia mysql para insertar datos
                $sql = "insert into Familiar values('$id', '$nom', '$apP', '$apM', '$anoN', '$paren', 
                '$calleNo', '$colonia', '$cp', '$ciudad','$estado', '$tel', '$idR')";
                
                //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
                $conexion->query($sql);  
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                    $_SESSION['exito'] = "si";
                    header("Location: altas_familiar.php");
                }else{
                    $_SESSION['exito'] = "no";
                    echo "<script>document.location='altas_familiar.php';</script>";
                }
         
  }
?>