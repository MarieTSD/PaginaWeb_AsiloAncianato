<?php
session_start();
error_reporting(0);
$serv = 'localhost';
$cuenta = 'root';
$contra = '';
$BaseD = 'ancianato';
$_SESSION['exito'] = "";

//Realiar la conexion con la base de datos 
$conexion4 = new mysqli($serv, $cuenta, $contra, $BaseD);
if ($conexion4->connect_error) {
    die('Ocurrio un error en la conexion con la BD');
} else {
    //Si entra aqui es que hubo una conexion existosa, Verificamos que haya dado enviar producto
    //Sacamos los valores con post

    //obtenemos datos del formulario
    $nom = $_POST['nomA'];
    $apM = $_POST['amA'];
    $apP = $_POST['apA'];
    $anoN = $_POST['anoNA'];
    $genero = $_POST['gen'];
    $civil = $_POST['estC'];
    
    //hacemos cadena con la sentencia mysql para insertar datos
    $sql = "INSERT INTO residente (Nombre, Apellido_P,Apellido_M, Fecha_Nac, Genero, Estado_civil) 
                    VALUES('$nom','$apP','$apM', '$anoN', '$genero', '$civil')";

    $_SESSION['exito'] = "si";

    //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
    $conexion4->query($sql);
    if ($conexion4->affected_rows >= 1) { //revisamos que se inserto un registro
        $_SESSION['exito'] = "si";
        header("Location: alResidente.php");
    } else {
        $_SESSION['exito'] = "no";
        echo "<script>document.location='alResidente.php';</script>";
    }
}