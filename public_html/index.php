<?php
//Codigo para las sesiones
$_SESSION['usuario']="";
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
    </head>
    <body >
               

       <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">ANCIANATO</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Servicio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Actividades</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contactanos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        

        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">ANCIANATO</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                      <p class="text-white-75 font-weight-light mb-5">La Mejor Convivencia, con el mejor tiempo de vida.</p>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Contamos con todas las comodidades y lo que necesita un adulto mayor </h2>
                        <hr class="divider light my-4" />
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Ver mas</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">NUESTROS SERVICIOS</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-user-nurse text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Servicio de Enfermeria</h3>
                            <p class="text-muted mb-0">El mejor personal capacitado para atender sus necesidades</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-utensils text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Servicio de Comedor </h3>
                            <p class="text-muted mb-0">Con un extremo cuidado de la alimentacion</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-chalkboard-teacher text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Clases</h3>
                            <p class="text-muted mb-0">Diferentes clases en diferentes horarios y maestros</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-name">Clases de danza</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-name">Ajedrez</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-name">Musica</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-name">Futbol</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <div class="project-name">Dibujo</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="" />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-name">Bingo</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">NUESTRAS CLASES</h2>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">CONTACTANOS</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Puedes encontrarnos por medio de : </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>(449) 2484121</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:contact@yourwebsite.com">ancianosyasociados@gmail.com</a>
                    </div>
                </div>
            </div>
        </section>

            <section class="page-section bg-primary" id="login">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <h2 class="text-white mt-0">PERSONA</h2>
                            <hr class="divider light my-4" />
                            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">EMPLEADO</a>
                            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">RESIDENTE</a>                         
                            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">FAMILIAR</a>
                            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">BENEFACTOR</a>
                        </div>
                    </div>
                </div>
            </section>

        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    </body>
</html>
