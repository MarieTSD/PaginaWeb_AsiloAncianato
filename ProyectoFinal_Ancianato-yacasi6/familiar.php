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
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 ml-2 w-100" id="mainNav">
        <div class="container ml-1">
            <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="img/logo5.png" class="logo" id="logo" alt=""></a>
            <a class="navbar-brand js-scroll-trigger mr-5" href="inicio_admin.php" style="font-size: 18px;">ADMIN</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse ml-5 text-center" id="navbarResponsive">
                <ul class="navbar-nav nav text-center mr-5">
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            DONACION
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="alta_donacion.php">ALTA</a>
                            <a class="dropdown-item" href="actualizar_donacion.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="visualizar_donacion.php">VISUALIZAR</a>
                            <a class="dropdown-item" href="familiar.php">DONACIONES POR FAMILIAR</a>
                            <a class="dropdown-item" href="benefactor.php">DONACIONES POR BENEFACTOR</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            FAMILIAR
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="altas_familiar.php">ALTA</a>
                            <a class="dropdown-item" href="baja_familiar.php">BAJA</a>
                            <a class="dropdown-item" href="actualizar_familiar.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="ver_familiar.php">VISUALIZAR</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            BENEFACTOR
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="altas_benefactor.php">ALTA</a>
                            <a class="dropdown-item" href="baja_benefactor.php">BAJA</a>
                            <a class="dropdown-item" href="actualizar_benefactor.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="ver_benefactor.php">VISUALIZAR</a>
                        </div>
                    </li>
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
                </ul>
            </div>
        <!--  <a class="btn btn-outline-light ml-4" href="#"><span class="glyphicon glyphicon-user"></span> LOGIN</a>-->
        <a class="btn btn-outline-light" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a>
         </div>
    </nav>

    <section class="bg-dark text-white h-20 " style="height:20%;">
        <div class="container text-center pt-5">
            <h2 class="mb-2 pt-5">DONACIONES POR FAMILIARES</h2>
        </div>
    </section>

    <div id="accordion">
        <div class="card m-5">
            <div class="card-header text-center" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        SUMINISTRO
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <section class="characteristics" style="line-height: 1;">
                        <section class="characteristics__container">
                            <?php
                            $result = mysqli_query($con, "SELECT * FROM donaciones where ID_Residente is not null");
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <article class="characteristics__item; card bg-light mb-3 border-dark">
                                    <ul class="list-group list-group-flush">
                                        <form method='post' action=''>
                                            <div class="card-header font-weight-bold">
                                                ID DONACION : <?php echo $row['ID']; ?>
                                            </div>
                                            <li class="list-group-item">
                                                ID RESIDENTE : <?php echo $row['ID_Residente']; ?>
                                            </li>
                                            <li class="list-group-item">
                                                <div>RESIDENTE : <?php echo $row['NombreCompleto']; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <div>ID SUMINISTRO : <?php echo $row['idsum']; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <div>Suministro : <?php echo $row['suministro']; ?></div>
                                            </li>
                                        </form>
                                    </ul>
                                </article>
                            <?php }
                            //mysqli_close($con);
                            ?>
                        </section>
                    </section>
                </div>
            </div>
        </div>

        <div class="card m-5">
            <div class="card-header text-center" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        MEDICAMENTO
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <section class="characteristics" style="line-height: 1;">
                        <section class="characteristics__container">
                            <?php
                            $resultado = mysqli_query($con, "SELECT * FROM donaciones where ID_Residente is not null");
                            while ($row = mysqli_fetch_assoc($resultado)) {
                            ?>
                                <article class="characteristics__item; card bg-light mb-3 border-dark">
                                    <ul class="list-group list-group-flush">
                                        <form method='post' action=''>
                                            <div class="card-header font-weight-bold">
                                                ID DONACION : <?php echo $row['ID']; ?>
                                            </div>
                                            <li class="list-group-item">
                                                ID RESIDENTE : <?php echo $row['ID_Residente']; ?>
                                            </li>
                                            <li class="list-group-item">
                                                <div>RESIDENTE : <?php echo $row['NombreCompleto']; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <div>ID MEDICAMENTO : <?php echo $row['idmedic']; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <div>MEDICAMENTO : <?php echo $row['medicamento']; ?></div>
                                            </li>
                                        </form>
                                    </ul>
                                </article>
                            <?php }
                            mysqli_close($con);
                            ?>
                        </section>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>
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