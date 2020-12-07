<?php
//Codigo para las sesiones
$_SESSION['usuario'] = "";
session_start();
//conexion a la base de datos
$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'ancianato';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);

error_reporting(0);
?>

<?php

$serv = 'localhost';
$cuenta = 'root';
$contra = '';
$BaseD = 'ancianato';

//Variables de session
$_SESSION['prom'] = '';
$_SESSION['m'] = '';
$_SESSION['f'] = '';

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
        $_SESSION['prom'] = $fila['cantidad'];
    }

    $sql3 = "call Generos()//";
    $conexion->query($sql3);
    $sql4 = "SELECT cantidad from aux where concepto = 'cantidadM'";
    $res = $conexion->query($sql4); 
    while($row = $res->fetch_assoc()){
        $_SESSION['m'] = $row['cantidad'];  
    }

    $sql5 = "SELECT cantidad from aux where concepto = 'cantidadF'";
    $res = $conexion->query($sql5); 
    while($rows = $res->fetch_assoc()){
        $_SESSION['f'] = $rows['cantidad'];  
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Ancianato</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="img/favicon.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="css/style.css">
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .page-section {
            background-color: #808080;
        }

        .cont {
            background-color: #FDF2E9;
            height: 92%;
        }

        .h4 {
            color: #000000;
        }

        .serv {
            margin: 40px;
        }

        .ima {
            width: 100%;
            height: 350px;
        }

        #contact2 {
            font-size: 20px;
        }

        .row2 {
            margin-top: -20px;
        }
    </style>
</head>

<body>
    <p id="page-top"></p>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container" id="page-top">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/logo5.png" id="logo" alt=""></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#page-top">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">CONOCENOS</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">SERVICIOS</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio2">ACTIVIDADES</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">CONTACTOS</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">LOGIN</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead w-100 mt-0">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold weight-700">ANCIANATO</h1>
                    <hr class="divider pl-5 pr-5 my-3" />
                </div>
                <div class="col-lg-8 align-self-baseline mt-0">
                    <p class="text-white-75 font-weight-light mb-5">La Mejor Convivencia, con el mejor tiempo de vida.</p>
                </div>
            </div>
        </div>
    </header>

    <!-- About-->
    <section class="page-section p-1 " id="about">
        <div class="col-lg-6 text-center mt-3">
            <h4 class="text-white mt-0">
                CONOCENOS
            </h4>
        </div>
    </section>
    <section class="page-section mt-0 pt-1">
        <table class="cont">
            <tr style="padding-left: 10px;">
                <td class="w-50 pl-3" style="text-align: center;">
                    <h5>
                        Somos una casa de descanso diseñada y construida para personas
                        de la tercera edad, brindándole con ello un amplio y confortable hogar.
                    </h5>
                </td>
                <td style="text-align: end;">
                    <img style="width: 50%;" src="img/conocenos1.jpg" alt="">
                </td>
            </tr>
            <tr>
                <td style="text-align: start;">
                    <img style="width: 50%;" src="img/conocenos2.jpg" alt="">
                </td>
                <td class="w-50 pl-0" style="text-align: center; margin-left: -10px;">
                    <h5>
                        Brindar un lugar con instalaciones amplias especialmente construidas con
                        amplios jardines, donde nuestros residentes mejoran su calidad de vida con una
                        adecuada alimentación y actividades recreativas que colaboran a su motivación
                        en una completa armonía.
                    </h5>
                </td>
            </tr>
            <tr style="padding-left: 10px;">
                <td class="w-50 pl-3" style="text-align: center;">
                    <h5>
                        Sabias que los <?php echo $_SESSION['prom']; ?> años, es el promedio de edad de los residentes.
                        Sientete agusto con los tuyos. Actualmente contamos con un total de <?php echo $_SESSION['f']; ?> mujeres 
                        y <?php echo $_SESSION['m']; ?> hombres. 
                    </h5>
                </td>
                <td style="text-align: end;">
                    <img style="width: 50%;" src="img/prom.jpg" alt="">
                </td>
            </tr>
        </table>
    </section>

    <!-- Services-->
    <section class="page-section p-1 " id="services">
        <div class="col-lg-6 text-center mt-4">
            <h4 class="text-white mt-0">
                NUESTROS SERVICIOS
            </h4>
        </div>
    </section>
    <section class="text-light w-100 cont" id="">
        <div class="container text-center ">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center serv">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-user-nurse text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Servicio de Enfermeria</h3>
                        <p class="text-muted mb-0">El mejor personal capacitado para atender sus necesidades</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center serv">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-utensils text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Servicio de Comedor </h3>
                        <p class="text-muted mb-0">Con un extremo cuidado de la alimentacion</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center serv">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-chalkboard-teacher text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Clases</h3>
                        <p class="text-muted mb-0">Diferentes clases en diferentes horarios y maestros</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center serv">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-wifi text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Wi-Fi</h3>
                        <p class="text-muted mb-0">Ofercemos acceso a internet en toda la instalacion.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center serv">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-capsules text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Medicamentos</h3>
                        <p class="text-muted mb-0">El residente, con permiso, tiene acceso a medicamento dentro del lugar.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center serv">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-gift text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Donaciones</h3>
                        <p class="text-muted mb-0">A traves de nuetros contactos, se nos puede donar facilmente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Portfolio-->
    <section class="page-section p-1 " id="portfolio2">
        <div class="col-lg-6 text-center mt-4">
            <h4 class="text-white mt-0">
                ACTIVIDIDADES
            </h4>
        </div>
    </section>
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4 col-sm-6 w-25">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg">
                        <img class="img-fluid ima" src="assets/img/portfolio/thumbnails/1.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Clases de danza</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg">
                        <img class="img-fluid ima" src="assets/img/portfolio/thumbnails/2.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Ajedrez</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg">
                        <img class="img-fluid ima" src="assets/img/portfolio/thumbnails/3.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Musica</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg">
                        <img class="img-fluid ima" src="assets/img/portfolio/thumbnails/4.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Futbol</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg">
                        <img class="img-fluid ima" src="assets/img/portfolio/thumbnails/5.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-name">Dibujo</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg">
                        <img class="img-fluid ima" src="assets/img/portfolio/thumbnails/6.jpg" alt="" />
                        <div class="portfolio-box-caption p-3">
                            <div class="project-name">Bingo</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact-->
    <section class="page-section p-1 " id="contact">
        <div class="col-lg-6 text-center mt-4">
            <h4 class="text-white mt-0">
                CONTACTANOS
            </h4>
        </div>
    </section>
    <section class="cont w-100 p-5" id="contact2">
        <div class="row">
            <div class="col-lg-4 ml-auto text-justify mb-5 mb-lg-0">
                <table class="">
                    <thead>
                        <h4>HORARIOS DE OFICINA</h4>
                    </thead>
                    <tr>
                        <td class="pr-5">Lunes:</td>
                        <td class="pl-3">10am a 7pm</td>
                    </tr>
                    <tr>
                        <td class="pr-5">Martes:</td>
                        <td class="pl-3">10am a 7pm</td>
                    </tr>
                    <tr>
                        <td class="pr-5">Miercoles:</td>
                        <td class="pl-3">10am a 7pm</td>
                    </tr>
                    <tr>
                        <td class="pr-5">Jueves:</td>
                        <td class="pl-3">10am a 7pm</td>
                    </tr>
                    <tr>
                        <td class="pr-5">Viernes:</td>
                        <td class="pl-3">10am a 7pm</td>
                    </tr>
                    <tr>
                        <td class="pr-5">Sabado:</td>
                        <td class="pl-3">10am a 2pm</td>
                    </tr>
                    <tr>
                        <td class="pr-5">Domingo:</td>
                        <td class="pl-3">Cerrado</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                <div>(449) 108 8798</div>
                <div>(449) 248 8798</div>
                <div>(449) 988 8798</div>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                <a class="d-block" href="mailto:contact@yourwebsite.com">ancianosyasociados@gmail.com</a>
            </div>
        </div>
        <div class="row row2">
            <div class="col-lg-12 mr-auto text-center">
                <div>UBICACION</div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7467.261128236327!2d-103.427061!3d20.64391!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe21106710495c48a!2sAsilo%20Las%20Hadas%20Casa%20Hogar%20A.%20C.!5e0!3m2!1ses-419!2smx!4v1607286502513!5m2!1ses-419!2smx" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-dark">Copyright © 2020 - Ancianato. El mejor tiempo de vida.</div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
</body>

</html>