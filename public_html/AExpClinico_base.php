<?php
    session_start();
    error_reporting(0);
    
    $serv = 'localhost';
    $cuenta = 'root';
    $contra = '';
    $BaseD = 'ancianato';
   
   //Variables de session
   $_SESSION['idR']='';
   $_SESSION['idM'] ='';
   $_SESSION['idA'] = '';
   $_SESSION['dosis'] = '';
   $_SESSION['motivo']='';
   $_SESSION['fecha']='';

  //Realiar la conexion con la base de datos 
   $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);
  if($conexion->connect_error){
      die('Ocurrio un error en la conexion con la BD');
  }else{  
    $modificar = $_SESSION['mod']; 
    $modificar2 = $_SESSION['mod2']; 
    $modificar3 = $_SESSION['mod3'];  
    $sql2 = "SELECT * from exp_clinico where ID_Residente='$modificar'
    and ID_Medicina = '$modificar2' and ID_Atencion_Medica = '$modificar3'";
    $resultado = $conexion -> query($sql2);
    while( $fila = $resultado -> fetch_assoc() ){
        $_SESSION['idR']= $fila['ID_Residente'];
        $_SESSION['idM'] = $fila['ID_Medicina'];
        $_SESSION['idA'] = $fila['ID_Atencion_Medica'];
        $_SESSION['dosis'] = $fila['Dosis'];
        $_SESSION['motivo']=$fila['Motivo'];
        $_SESSION['fecha']=$fila['Fecha'];
    } 
 if(isset($_POST['submit'])){
    $uno = $_POST["residente"];
    $dos = $_POST["medicina"];
    $tres = $_POST["atencion"];
    $cuatro = $_POST["dos"];
    $cinco = $_POST["mot"];
    $seis = $_POST['fec'];

    $modificar = $_SESSION["mod"];
    $modificar2 = $_SESSION['mod2']; 
    $modificar3 = $_SESSION['mod3'];
    $ne="UPDATE exp_clinico set ID_Residente='$uno', ID_Medicina='$dos', ID_Atencion_Medica='$tres', 
    Dosis='$cuatro', Motivo='$cinco', Fecha='$seis'
    WHERE ID_Residente='$modificar' and ID_Medicina='$modificar2' and ID_Atencion_Medica = '$modificar3'";
    
    echo $ne; 
    $fin = $conexion -> query($ne);
     if ($conexion->affected_rows >= 1){ 
           $_SESSION['exito2'] = "si";
            header("Location: AExpClinico.php");
        }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Ancianato</title>
<link rel="stylesheet" href="css/styles.css">
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
rel="stylesheet" type="text/css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link rel="stylesheet" href="css/style.css">
<link href="css/styles.css" rel="stylesheet" />
<!--  Para el los menajes de confimacion ets-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
<div class="container">
    <a class="navbar-brand js-scroll-trigger" href="inicio_admin.php">Adminitrador</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <li class="nav-item dropdown show">
                <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    EMPLEADO
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="altas_empleado.php">ALTA</a>
                    <a class="dropdown-item" href="baja_empleado.php">BAJA</a>
                    <a class="dropdown-item" href="actualizar_empleado.php">ACTUALIZAR</a>
                    <a class="dropdown-item" href="ver_empleados.php">VISUALIZAR</a>
                </div>
            </li>
            <li class="nav-item dropdown show">
                <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    DONACION
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="alta_donacion.php">ALTA</a>
                    <!--<a class="dropdown-item" href="baja_donacion.php">BAJA</a>-->
                    <a class="dropdown-item" href="actualizar_donacion.php">ACTUALIZAR</a>
                    <a class="dropdown-item" href="visualizar_donacion.php">VISUALIZAR</a>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">MEDICAMENTO</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">CLASE</a></li>
            <li class="nav-item dropdown show">
                <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ATENCION MEDICA
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="al_amedica.php">ALTA</a>
                    <a class="dropdown-item" href="b_amedica.php">BAJA</a>
                    <a class="dropdown-item" href="a_amedica.php">ACTUALIZAR</a>
                    <a class="dropdown-item" href="v_amedica.php">VISUALIZAR</a>
                </div>
            </li>
            <li class="nav-item dropdown show">
                <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    RESIDENTE
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="alResidente.php">ALTA</a>
                    <a class="dropdown-item" href="bResidente.php">BAJA</a>
                    <a class="dropdown-item" href="aResidente.php">ACTUALIZAR</a>
                    <a class="dropdown-item" href="vResidente.php">VISUALIZAR</a>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">SUMINISTRO</a></li>
            <li class="nav-item dropdown show">
                <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Expediente Cinico
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="AlExpClinico.php">ALTA</a>
                    <a class="dropdown-item" href="BExpeClinico.php">BAJA</a>
                    <a class="dropdown-item" href="AExpClinico.php">ACTUALIZAR</a>
                    <a class="dropdown-item" href="VExpClinico.php">VISUALIZAR</a>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">SUMINISTRO</a></li>
        </ul>
    </div>
</div>
</nav>

<section class="bg-primary text-white h-25">
<div class="container text-center pt-5">
    <h2 class="mb-2 pt-5">ACTUALIZAR CAMPOS EXPEDIENTE CLINICO</h2>
</div>
</section>

<section class="hero3">
<form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
    enctype="multipart/form-data" method="post" id="alta">

    <div class="container-contact100-form-btn p-1">
        <span class="label-input100">Residente:</span>
        <select name="residente" id="residente" class="input100">
            <option >Seleccion Residente</option>
            <?php 
                    $sql2 = $conexion->query( "SELECT * FROM residente"); 

                    while($fila = $sql2->fetch_array()){
                        echo "<option value='".$fila['ID']."'>".$fila['Nombre']."</option>";
                    }
            ?>
        </select>
    </div>

    <div class="container-contact100-form-btn p-1">
        <span class="label-input100">Medicina:</span>
        <select name="medicina" id="medicina" class="input100">
            <option >Seleccion Medicina</option>
            <?php 
                    $sql2 = $conexion->query( "SELECT * FROM  medicina"); 

                    while($fila = $sql2->fetch_array()){
                        echo "<option value='".$fila['ID']."'>".$fila['Nombre']."</option>";
                    }
            ?>
        </select>
    </div>

    <div class="container-contact100-form-btn p-1">
        <span class="label-input100">ATENCION MEDICA:</span>
        <select name="atencion" id="atencionmedica" class="input100">
            <option >Seleccion Atencion Medica</option>
            <?php 
                    $sql2 = $conexion->query( "SELECT * FROM atencion_medica"); 

                    while($fila = $sql2->fetch_array()){
                        echo "<option value='".$fila['ID']."'>".$fila['Nombre']."</option>";
                    }
            ?>
        </select>
    </div>

    <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
        <span class="label-input100">Dosis:</span>
        <input class="input100" type="text" name="dos" value="<?php echo $_SESSION['dosis']; ?>" required>
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input p-1" data-validate="Valid email is required: ex@abc.xyz">
        <span class="label-input100">Motivo:</span>
        <input class="input100" type="text" name="mot" value="<?php echo $_SESSION['motivo']; ?>" required>
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
        <span class="label-input100">Fecha</span>
        <input class="input100" type="date" name="fec" value="<?php echo $_SESSION['fecha']; ?>" required>
        <span class="focus-input100"></span>
    </div>

    <div class="container-contact100-form-btn p-1">
        <button class="btn btn-outline-info w-50 p-3 m-1" name="submit">
            <span>
                ACTUALIZAR EXPEDIENTE CLINICO
                <i class="fan fan-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
        </button>
    </div>
</form>
</section>

<!-- Footer-->
<footer class="bg-light py-5">
<div class="container">
    <div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div>
</div>
</footer>

<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>