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
            $cantidad = $_POST['idC']; 
            $suministro = $_POST['id_suministro']; 
            $medicina = $_POST['id_medicamento'];
            if($residente == "0"){
                $sql = "INSERT INTO donacion (ID, Aporte, Fecha, Hora, ID_Benefactor) 
            VALUES('$id','$aporte','$fecha','$hora','$benefactor')";
            $_SESSION['exito'] = "si";
            }else{
                $sql = "INSERT INTO donacion (ID, Aporte, Fecha, Hora, ID_Residente) 
                VALUES('$id','$aporte','$fecha','$hora', '$residente')";
                $_SESSION['exito'] = "si";
            }
            
            if($medicina == "1"){
                $sql2 = "INSERT INTO aparecen_sd( Codigo_Suministro, ID_Donacion, Cantidad)
                VALUES('$suministro','$id', '$cantidad')";
            }else{
                $sql2 = "INSERT INTO aparecen_md (ID_Medicamento, ID_Donacion, Cantidad)
                VALUES('$medicina', '$id', '$cantidad')";
            }
            echo $sql2; 
    
            $conexion->query($sql);
            $conexion->query($sql2); 

        if ($conexion->affected_rows >= 1) {
                $_SESSION['exito'] = "si";
                header("Location: alta_donacion.php");
            } else {
                $_SESSION['exito'] = "no";
                echo "<script>document.location='alta_donacion.php';</script>";
                }
    }