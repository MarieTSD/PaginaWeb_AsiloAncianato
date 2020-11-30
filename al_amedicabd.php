<?php
session_start();
error_reporting(0);
$serv = 'localhost';
$cuenta = 'root';
$contra = '';
$BaseD = 'ancianato';
$_SESSION['exito'] = "";

//Realiar la conexion con la base de datos 
$conexion2 = new mysqli($serv, $cuenta, $contra, $BaseD);
if ($conexion2->connect_error) {
    die('Ocurrio un error en la conexion con la BD');
} else {
    //Si entra aqui es que hubo una conexion existosa, Verificamos que haya dado enviar producto
    //Sacamos los valores con post

    //obtenemos datos del formulario
    $nombre = $_POST['nombre'];
    $calle = $_POST['calle'];
    $col = $_POST['coloniaA'];
    $CodigoPostal = $_POST['cpA'];
    $ciud = $_POST['ciudadA'];
    $est = $_POST['estadoA'];
    $rfc = $_POST['rfc'];
    $telefono = $_POST['telA'];

    $sql = "INSERT INTO atencion_medica (Nombre, CalleNo, Colonia, CP, Cuidad, Estado, RFC, Telefono) 
            VALUES('$nombre','$calle','$col', '$CodigoPostal', '$ciud', '$est', '$rfc', '$telefono')";
   /* echo $id; 
    echo $nombre;
    echo $calle; 
    echo $col; 
    echo $CodigoPostal; 
    echo $ciud;
    echo $est; 
    echo $rfc; 
    echo $telefono; 
    echo $sql; */

    $_SESSION['exito'] = "si";
    $conexion2->query($sql); 
   if ($conexion2->affected_rows >= 1) {
        $_SESSION['exito'] = "si";
        
        header("Location: al_amedica.php");
    } else {
        
        $_SESSION['exito'] = "no";
        echo "<script>document.location='al_amedica.php';</script>";
    }
}
?>