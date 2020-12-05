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
        $modificar2 = $_SESSION['mod2']; 
        $modificar3 = $_SESSION['mod3'];
        $sql =  "DELETE FROM exp_clinico where ID_Residente='$modificar'
        and ID_Medicina='$modificar2' and ID_Atencion_Medica='$modificar3'";
            $conexion->query($sql); 
            if ($conexion->affected_rows >= 1){ 
                $_SESSION['exito1'] = "si";
                header("Location: BExpeClinico.php");
            }
    }
 ?>