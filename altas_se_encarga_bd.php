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
    $ida = $_POST['idA'];
    $ide = $_POST['idE'];
    $idr = $_POST['idR'];
    $fecha = $_POST['fechaA'];
    $hora = $_POST['horaA'];

    //hacemos cadena con la sentencia mysql para insertar datos
    $sql = "INSERT INTO se_encarga (ID, ID_Empleado, ID_Residente, Fecha, Horario) 
                    VALUES('$ida', '$ide','$idr','$fecha', '$hora')";

    $_SESSION['exito'] = "si";

    //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
    $conexion->query($sql);
    if ($conexion->affected_rows >= 1) { //revisamos que se inserto un registro
        $_SESSION['exito'] = "si";
        header("Location: altas_se_encarga.php");
    } else {
        $_SESSION['exito'] = "no";
        echo "<script>document.location='altas_se_encarga.php';</script>";
    }
}
