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

    //if (isset($_POST['submit'])) {
    $idd = $_POST['id'];
    $cantidadS = $_POST['idC'];
    $cantidadM = $_POST['idMedic'];
    $suministro = $_POST['suministro'];
    $medicina = $_POST['medicamento'];

    //echo $idd.$cantidadS.$cantidadM.$suministro.$medicina; 

    if ($medicina != '0' && $suministro != '0') {
        $sql2 = "INSERT INTO aparecen_sd( Codigo_Suministro, ID_Donacion, Cantidad)
                VALUES('$suministro','$idd', '$cantidadS')";

        $sql3 = "INSERT INTO aparecen_md (ID_Medicamento, ID_Donacion, Cantidad)
                VALUES('$medicina', '$idd', '$cantidadM')";
        $sql4 = "call actualizarMedic('$medicina','$cantidadM')";
    } else if ($medicina != '0' && $suministro == '0') {
        $sql3 = "INSERT INTO aparecen_md (ID_Medicamento, ID_Donacion, Cantidad)
            VALUES('$medicina', '$idd', '$cantidadM')";
        $sql4 = "call actualizarMedic('$medicina','$cantidadM')";
    } else if ($medicina == '0' && $suministro != '0') {
        $sql2 = "INSERT INTO aparecen_sd( Codigo_Suministro, ID_Donacion, Cantidad)
                VALUES('$suministro','$idd', '$cantidadS')";
    }
    //}

    $conexion->query($sql2);
    $conexion->query($sql3);
    $conexion->query($sql4);

    if ($conexion->affected_rows >= 1) {
        $_SESSION['exitoA'] = "si";
        header("Location: alta_donacionbase.php");
    } else {
        $_SESSION['exitoA'] = "no";
        header("Location: alta_donacionbase.php");
    }
    if (isset($_POST['submit2'])) {
        header("Location:alta_donacion.php");
    }
}
