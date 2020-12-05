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

        if($medicina!='1' && $suministro != '1'){
            $sql2 = "INSERT INTO aparecen_sd( Codigo_Suministro, ID_Donacion, Cantidad)
                VALUES('$suministro','$idd', '$cantidadS')";

            $sql3 = "INSERT INTO aparecen_md (ID_Medicamento, ID_Donacion, Cantidad)
                VALUES('$medicina', '$idd', '$cantidadM')";
             $sql4 = "CALL actualizarMedic($medicina,$cantidadM)";
        }else if($medicina!='1' && $suministro == '1'){
            $sql3 = "INSERT INTO aparecen_md (ID_Medicamento, ID_Donacion, Cantidad)
            VALUES('$medicina', '$idd', '$cantidadM')";
            $sql4 = "CALL actualizarMedic($medicina,$cantidadM)"; 
        }else if($medicina == '1' && $suministro != '1'){
            $sql2 = "INSERT INTO aparecen_sd( Codigo_Suministro, ID_Donacion, Cantidad)
                VALUES('$suministro','$idd', '$cantidadS')";
        }
    //}
    
    $conexion->query($sql2);
    $conexion->query($sql3);
    $conexion->query($sql4);
   if ($conexion->affected_rows >= 1) {
        $_SESSION['exito'] = "si";
        header("Location: alta_donacionbase.php");
        echo '<script>swal("Alta Exitosa", "Continua dando de alta", "success");</script>';
    } else {
        $_SESSION['exito'] = "no";
        echo "<script>document.location='alta_donacionbase.php';</script>";
        echo '<script>swal("ID Repetido", "El id debe ser unico", "error");</script>';

    }
}
