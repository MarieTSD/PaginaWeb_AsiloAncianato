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
    $conexion = new mysqli($serv, $cuenta, $contra, $BaseD);
    if ($conexion->connect_error) {
        die('Ocurrio un error en la conexion con la BD');
    } else {

            //sacamos del formulario los datos
            $id = $_POST['idD']; 
            $aporte = $_POST['aporte']; 
            $fecha = $_POST['fec']; 
            $hora = $_POST['hr']; 
            $residente = $_POST['id_residente']; 
            $benefactor = $_POST['id_benefactor'];  
            
            $sql = "INSERT INTO donacion (ID, Aporte, Fecha, Hora, ID_Residente, ID_Benefactor) 
            VALUES('$id','$aporte','$fecha','$hora', '$residente', '$benefactor')";
            $_SESSION['exito'] = "si";

    $conexion->query($sql);

   if ($conexion->affected_rows >= 1) { 
        $_SESSION['exito'] = "si";
        header("Location: alta_donacion.php");
    } else {
        $_SESSION['exito'] = "no";
        echo "<script>document.location='alta_donacion.php';</script>";
        }
    }