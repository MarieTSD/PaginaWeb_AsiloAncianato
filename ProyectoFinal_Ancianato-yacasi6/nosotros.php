
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


    $sql = "call promedad()//";
    $conexion->query($sql); 
    $sql2="SELECT cantidad from aux where concepto = 'promedioEdad'";
    $resultado = $conexion->query($sql2);
    while($fila = $resultado->fetch_assoc()){
        $_SESSION['cant'] = $fila['cantidad'];
    }

    $sql3 = "call Generos()//";
    $conexion->query($sql3);
    $sql4 = "SELECT cantidad from aux where concepto = 'cantidadM'";
    $res = $conexion->query($sql4); 
    while($row = $res->fetch_assoc()){
        $_SESSION['masculino'] = $row['cantidad'];  
    }

    $sql5 = "SELECT cantidad from aux where concepto = 'cantidadF'";
    $res = $conexion->query($sql5); 
    while($rows = $res->fetch_assoc()){
        $_SESSION['femenino'] = $rows['cantidad'];  
    }


}

?>
<!DOCTYPE html>

<html lang="es">

<head>
        <title>Login</title>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Ancianato</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/log.css" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">ANCIANATO</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Servicio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Actividades</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Contactanos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="nosotros.php">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<br>
<br>
<br>

<section class="bg-dark text-white h-20 " style="height:20%;">
        <div class="container text-center pt-5">
            <h2 class="mb-2 pt-5">NOSOTROS</h2>
            <br><br>
        </div>
</section>
<br>
<br>
<br>
    <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">PROMEDIO DE LAS EDADES DE LOS RESIDENTES</h5>
        <?php ?>
        <p class="card-text"><?php echo $_SESSION['cant'];?> años</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">GENERO DE LOS RESIDENTES</h5>
        <p class="card-text">Masculino: <?php echo $_SESSION['masculino'];?> Hombres</p>
        <p class="card-text">Femenino: <?php echo $_SESSION['femenino'];?> Mujeres</p>
      </div>
    </div>
  </div>
</div>
<footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">Copyright © 2020 - Ancianato. El mejor tiempo de vida.</div>
        </div>
    </footer>
 </body>
</html>