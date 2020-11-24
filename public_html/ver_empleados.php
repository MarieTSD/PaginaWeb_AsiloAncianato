<?php
session_start();
error_reporting(0);
include('db.php');
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
    <link rel="stylesheet" href="css/style.css">
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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">DONACION</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">MEDICAMENTO</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">CLASE</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">ATENCION MEDICA</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">SUMINISTRO</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="bg-primary text-white h-25">
        <div class="container text-center pt-5">
            <h2 class="mb-2 pt-5">VER EMPLEADOS</h2>
        </div>
    </section>

    <section class="characteristics">
        <section class="characteristics__container">
            <?php
            $result = mysqli_query($con, "SELECT * FROM `empleado`");
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <article class="characteristics__item; card bg-light mb-3 border-dark">
                    <ul class="list-group list-group-flush">
                        <form method='post' action=''>
                            <div class="card-header font-weight-bold">
                                ID: <?php echo $row['ID']; ?>
                            </div>
                            <li class="list-group-item">
                                Nombre(s): <?php echo $row['Nombre']; ?>
                            </li>
                            <li class="list-group-item">
                                <div>Apellido paterno: <?php echo $row['Apellido_P']; ?></div>
                            </li>
                            <li class="list-group-item">
                                <div>Apellido materno: <?php echo $row['Apellido_M']; ?></div>
                            </li>
                            <li class="list-group-item">
                                <div>Fecha de nacimiento: <?php echo $row['Fecha_Nac']; ?></div>
                            </li>
                            <li class="list-group-item">
                                <div>Calle y No: <?php echo $row['CalleNo']; ?></div>
                            </li>
                            <li class="list-group-item">
                                <div>Colonia: <?php echo $row['Colonia']; ?></div>
                            </li>
                            <li class="list-group-item">
                                <div>Codigo postal: <?php echo $row['CP']; ?></div>
                            </li>
                            <li class="list-group-item">
                                <div>Ciudad: <?php echo $row['Ciudad']; ?></div>
                            </li>
                            <li class="list-group-item">
                                <div>Estado: <?php echo $row['Estado']; ?></div>
                            </li>
                            <li class="list-group-item">
                                <div>Telefono: <?php echo $row['Telefono']; ?></div>
                            </li>
                            <li class="list-group-item">
                                <div>Sueldo: <?php echo $row['Sueldo']; ?></div>
                            </li>
                            <li class="list-group-item">
                                <div>Tipo: <?php echo $row['Tipo']; ?></div>
                            </li>
                        </form>
                    </ul>
                </article>
            <?php }
            mysqli_close($con);
            ?>
        </section>
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