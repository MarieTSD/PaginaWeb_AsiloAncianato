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
    <link rel="icon" type="image/x-icon" href="img/favicon.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="css/style.css">
    <link href="css/styles.css" rel="stylesheet" />
    <!--  Para el los menajes de confimacion ets-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 ml-0 " id="mainNav">
        <div class="container ml-1">
            <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="img/logo5.png" class="logo" id="logo" alt=""></a>
            <a class="navbar-brand js-scroll-trigger mr-5" href="inicio_admin.php" style="font-size: 18px;">ADMIN</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse ml-5" id="navbarResponsive">
                <ul class="navbar-nav nav justify-content-center mr-5">
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
                            RESIDENTE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="alResidente.php">ALTA</a>
                            <a class="dropdown-item" href="bResidente.php">BAJA</a>
                            <a class="dropdown-item" href="aResidente.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="vResidente.php">VISUALIZAR</a>
                            <a class="dropdown-item" href="ver_FamiliaresDeResidente.php">FAMILIARES</a>
                            <a class="dropdown-item" href="ver_ResidenteExpeClinico.php">EXPEDIENTE CLINICO</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CLASE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="altas_clase.php">ALTA</a>
                            <a class="dropdown-item" href="baja_clase.php">BAJA</a>
                            <a class="dropdown-item" href="actualizar_clase.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="ver_clase.php">VISUALIZAR</a>
                            <a class="dropdown-item" href="listas_clases.php">LISTAS DE ALUMNOS</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            INSCRIPCIONES A CLASE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="altas_asiste.php">ALTA</a>
                            <a class="dropdown-item" href="baja_asiste.php">BAJA</a>
                            <a class="dropdown-item" href="actualizar_asiste.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="ver_asiste.php">VISUALIZAR</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CRONOGRAMA DE CUIDADOS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="altas_se_encarga.php">ALTA</a>
                            <a class="dropdown-item" href="baja_se_encarga.php">BAJA</a>
                            <a class="dropdown-item" href="actualizar_se_encarga.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="ver_se_encarga.php">VISUALIZAR</a>
                        </div>
                    </li>
                </ul>
            </div>
            <a class="btn btn-outline-light" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a>
        </div>
    </nav>

    <section class="bg-dark text-white h-20 " style="height:20%;">
        <div class="container text-center pt-5">
            <h2 class="mb-2 pt-5">CLASES</h2>
        </div>
    </section>

    <section class="characteristics" style="line-height: 1;">
        <section class="characteristics__container">
            <?php
            $result = mysqli_query($con, "SELECT * FROM `clase`");
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <article class="characteristics__item; card bg-light mb-3 border-dark">
                    <ul class="list-group list-group-flush">
                        <form method='post' action=''>
                            <div class="card-header font-weight-bold">
                                ID: <?php echo $row['ID']; ?>
                            </div>
                            <li class="list-group-item">
                                Descripcion: <?php echo $row['Descripcion']; ?>
                            </li>
                            <li class="list-group-item">
                                Area: <?php echo $row['Area']; ?>
                            </li>
                            <li class="list-group-item">
                                ID Empleado: <?php echo $row['ID_Empledao']; ?>
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