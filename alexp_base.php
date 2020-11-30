<?php
//codigo de conexion
session_start();
error_reporting(0);
$serv = 'localhost';
$cuenta = 'root';
$contra = '';
$BaseD = 'ancianato';
$_SESSION['exito'] = "";

//Realiar la conexion con la base de datos 
    $conexion6 = new mysqli($serv, $cuenta, $contra, $BaseD);
    if ($conexion6->connect_error) {
        die('Ocurrio un error en la conexion con la BD');
    } else {

            //sacamos del formulario los datos
            $resid = $_POST['residente']; 
            $med = $_POST['medicina']; 
            $atmedica = $_POST['atencionmedica']; 
            $dos = $_POST['dosis']; 
            $mot = $_POST['motivo']; 
            $fec = $_POST['fecha'];  
            
            $sql2 = "INSERT INTO exp_clinico (ID_Residente, ID_Medicina, ID_Atencion_Medica, Dosis, Motivo, Fecha) 
             VALUES('$resid','$med','$atmedica','$dos', '$mot', '$fec')";

            echo $sql2; 
            
            $_SESSION['exito'] = "si";

            $conexion6->query($sql2);

            if ($conexion6->affected_rows >= 1) { 
                    $_SESSION['exito'] = "si";
                    header("Location: AlExpClinico.php");
                } else {
                    $_SESSION['exito'] = "no";
                    echo "<script>document.location='AlExpClinico.php';</script>";
                    }
    }