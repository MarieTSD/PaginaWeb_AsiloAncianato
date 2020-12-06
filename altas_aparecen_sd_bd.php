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
    $ids = $_POST['idS'];
    $idd = $_POST['idD'];
    $cant = $_POST['cantA'];

    //hacemos cadena con la sentencia mysql para insertar datos
    $sql = "INSERT INTO aparecen_sd (Codigo_Suministro, ID_Donacion, Cantidad) 
                    VALUES('$ids','$idd','$cant')";

    $_SESSION['exito'] = "si";

    //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
    $conexion->query($sql);
    if ($conexion->affected_rows >= 1) { //revisamos que se inserto un registro
        $_SESSION['exito'] = "si";
        header("Location: altas_aparecen_sd.php");
    } else {
        $_SESSION['exito'] = "no";
        echo "<script>document.location='altas_aparecen_sd.php';</script>";
    }
}
