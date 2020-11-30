<?php
    session_start();
    error_reporting(0);
    
    $serv = 'localhost';
    $cuenta = 'root';
    $contra = '';
    $BaseD = 'ancianato';
   
   //Variables de session
   $_SESSION['id']='';
   $_SESSION['aporte'] ='';
   $_SESSION['fec'] = '';
   $_SESSION['hora'] = '';
   $_SESSION['residente']='';
   $_SESSION['benefactor']='';

  //Realiar la conexion con la base de datos 
   $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);
  if($conexion->connect_error){
      die('Ocurrio un error en la conexion con la BD');
  }else{  
    $modificar = $_SESSION['mod'];  
    $sql2 = "SELECT * from donacion where ID='$modificar'";
    $resultado = $conexion -> query($sql2);
    while( $fila = $resultado -> fetch_assoc() ){
        $_SESSION['id']= $fila['ID'];
        $_SESSION['aporte'] = $fila['Aporte'];
        $_SESSION['fec'] = $fila['Fecha'];
        $_SESSION['hora'] = $fila['Hora'];
        $_SESSION['residente']=$fila['ID_Residente'];
        $_SESSION['benefactor']=$fila['ID_Benefactor'];
    } 
 if(isset($_POST['submit'])){
    $uno = $_POST["id"];
    $dos = $_POST["aport"];
    $tres = $_POST["fecha"];
    $cuatro = $_POST["hr"];
    $cinco = $_POST["resi"];
    $seis = $_POST['bene'];

    $modificar = $_SESSION["mod"];
    $ne="UPDATE donacion set ID='$uno', Aporte='$dos', Fecha='$tres', 
    Hora='$cuatro', ID_Residente='$cinco', ID_Benefactor='$seis'
    WHERE ID='$modificar'";
    
    echo $ne; 
    $fin = $conexion -> query($ne);
     if ($conexion->affected_rows >= 1){ 
           $_SESSION['exito2'] = "si";
            header("Location: actualizar_donacion.php");
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
                    <a class="dropdown-item" href="baja_donacion.php">BAJA</a>
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
    <h2 class="mb-2 pt-5">ACTUALIZAR CAMPOS DONACION</h2>
</div>
</section>

<section class="hero3">
<form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
    enctype="multipart/form-data" method="post" id="alta">

    <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
        <span class="label-input100">ID:</span>
        <input class="input100" type="number" name="id" value="<?php echo $_SESSION['id']; ?>" readonly>
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input p-1" data-validate="Valid email is required: ex@abc.xyz">
        <span class="label-input100">Aporte:</span>
        <input class="input100" type="text" name="aport" value="<?php echo $_SESSION['aporte']; ?>" required>
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
        <span class="label-input100">Fecha:</span>
        <input class="input100" type="date" name="fecha" value="<?php echo $_SESSION['fec']; ?>" required>
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
        <span class="label-input100">Hora: </span>
        <input class="input100" type="time" name="hr" value="<?php echo $_SESSION['hora']; ?>" required>
        <span class="focus-input100"></span>
    </div>


    <div class="container-contact100-form-btn p-1">
        <span class="label-input100">Residente:</span>
        <select name="resi" id="residente" class="input100">
            <option >Seleccion Residente: </option>
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
        <select name="bene" id="medicina" class="input100">
            <option >Seleccion Benefactor:</option>
            <?php 
                    $sql2 = $conexion->query( "SELECT * FROM benefactor"); 

                    while($fila = $sql2->fetch_array()){
                        echo "<option value='".$fila['ID']."'>".$fila['Nombre']."</option>";
                    }
            ?>
        </select>
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