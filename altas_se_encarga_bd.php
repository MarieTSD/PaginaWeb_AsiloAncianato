<?php
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
    //Si entra aqui es que hubo una conexion existosa, Verificamos que haya dado enviar producto
    //Sacamos los valores con post

    //obtenemos datos del formulario
    $ide = $_POST['idE'];
    $idr = $_POST['idR'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    //hacemos cadena con la sentencia mysql para insertar datos
    $sql = "INSERT INTO se_encarga VALUES('$ide','$idr','$fecha','$hora')";

    //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
    $conexion->query($sql);
    if ($conexion->affected_rows >= 1) { //revisamos que se inserto un registro
        $_SESSION['exito'] = "si";
        echo $sql;
        echo "<script>alert('$sql')</script>";
        //header("Location: altas_se_encarga.php");
    } else {
        $_SESSION['exito'] = "no";
        echo $sql;
        echo "<script>alert('$sql')</script>";
        //echo "<script>document.location='altas_se_encarga.php';</script>";
    }
}
