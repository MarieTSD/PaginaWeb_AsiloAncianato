<?php
    //Admin
    session_start();

    //conexion a la base de datos
    $servidor = 'localhost';
    $cuenta = 'root';
    $password = '';
    $bd = 'ancianato';
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
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
        <link href="css/styles.css" rel="stylesheet" />
        <!--  Para el los menajes de confimacion ets-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="JS/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="JS/actions.js"></script>
    <script type="text/javascript" src="JS/Personas.js"></script>
    <script type="text/javascript" src="JS/classO.js"></script>
    <script type="text/javascript" src="JS/domicilio_tel.js"></script>
    </head>
    <body >
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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">DONACION</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">MEDICAMENTO</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">CLASE</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">ATENCION MEDICA</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">SUMINISTRO</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">ALTA CLASE</h2>
            </div>
        </section>

        <?php
            if($_SESSION['exito'] == "si"){
                echo '<script>swal("Alta Exitosa", "Continua dando de alta", "success");</script>';
                          
                $_SESSION['exito'] = "";
            }else if($_SESSION['exito'] == "no"){
                echo '<script>swal("ID Repetido", "El id debe ser unico", "error");</script>';
                $_SESSION['exito']="";
            }else if($_SESSION['exito']="x"){
                echo '<script>swal("ID de empleado incorrecto", "El id no existe", "error");</script>';
                $_SESSION['exito']="";
            }
        ?>

    <div class="container">
        <form action="" id="form">
        <div class="wrap-input100 validate-input" data-validate="Requerido">
            <span class="label-input100">ID:</span>
            <input class="input100" type="number" id="idA" name="idA" placeholder="123" required>
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Requerido">
            <span class="label-input100">Descripcion:</span>
            <input class="input100" type="text" id="nomA" name="nomA" placeholder="Luis" required>
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Requerido">
            <span class="label-input100">Area:</span>
            <input class="input100" type="text" id="apA" name="apA" placeholder="Flores" required>
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input">
            <span class="label-input100">ID Empleado:</span>
            <input class="input100" type="text" id="amA" name="amA" placeholder="Serna">
            <span class="focus-input100"></span>
        </div>

        
        
        
        <div class="container-contact100-form-btn">
            <button class="contact100-form-btn" onclick="getDataCla()" name="submit">
                <span>
                    Agregar clase
                    <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                </span>
            </button>
        </div>   
        </form>
    </div>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div></div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
