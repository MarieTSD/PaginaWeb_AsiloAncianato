<?php
    session_start();
    error_reporting(0);
    
    $serv = 'localhost';
    $cuenta = 'root';
    $contra = '';
    $BaseD = 'ancianato';

    $_SESSION['exito1']="";
    
    //Realiar la conexion con la base de datos 
    $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);
    if($conexion->connect_error){
        die('Ocurrio un error en la conexion con la BD');
    }else{
        $modificar = $_SESSION["mod"];
        $modificar2 = $_SESSION["mod2"];
        $sql =  "DELETE FROM se_encarga WHERE ID_Empleado='$modificar' and ID_Residente='$modificar2'";
            $conexion->query($sql); 
            if ($conexion->affected_rows >= 1){ 
                $_SESSION['exito1'] = "si";
                header("Location: baja_se_encarga.php");
            }
    }
 ?>