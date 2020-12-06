<?php
    session_start();
    error_reporting(0);
    
    $serv = 'localhost';
    $cuenta = 'root';
    $contra = '';
    $BaseD = 'ancianato';

    $_SESSION['exito1']="";
    
    $conexion1 = new mysqli($serv,$cuenta,$contra,$BaseD);
    if($conexion1->connect_error){
        die('Ocurrio un error en la conexion con la BD');
    }else{
        $modificar = $_SESSION["mod"];
        $sql ="DELETE FROM atencion_medica WHERE ID='$modificar'";
            $conexion1->query($sql); 
            if ($conexion1->affected_rows >= 1){ 
                $_SESSION['exito1'] = "si";
                header("Location: b_amedica.php");
            }else{
                echo "hola";
            }
    }
 ?>