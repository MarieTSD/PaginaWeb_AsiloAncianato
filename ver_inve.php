<?php
session_start();
error_reporting(0);
include('db.php');
$pre= mysqli_query($con, "call cantidadS()//");
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
   <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 ml-2" id="mainNav">
        <div class="container ml-1">
            <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="img/logo5.png" class="logo" id="logo" alt=""></a>
            <a class="navbar-brand js-scroll-trigger mr-5" href="inicio_admin.php" style="font-size: 18px;">ADMIN</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse ml-5" id="navbarResponsive">
                <ul class="navbar-nav nav justify-content-center mr-5">
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            SUMINISTRO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="altas_suministro.php">ALTA</a>
                            <a class="dropdown-item" href="baja_suministro.php">BAJA</a>
                            <a class="dropdown-item" href="actualizar_suministro.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="ver_suministro.php">VISUALIZAR</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            MEDICAMENTO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="altas_medicina.php">ALTA</a>
                            <a class="dropdown-item" href="baja_medicina.php">BAJA</a>
                            <a class="dropdown-item" href="actualizar_medicina.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="ver_medicina.php">VISUALIZAR</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link " href="#" role="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            INVENTARIO SUMINISTROS
                        </a>
                    </li>    
                </ul>
            </div>
           <!--  <a class="btn btn-outline-light ml-4" href="#"><span class="glyphicon glyphicon-user"></span> LOGIN</a>-->
          <a class="btn btn-outline-light" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a>
        </div>
    </nav>

    <section class="bg-dark text-white h-20 " style="height:30%;">
        <div class="container text-center pt-5">
            <h2 class="mb-2 pt-5">Inventario</h2>
        </div>
    </section>

    <section class="characteristics" style="line-height: 1;">
        <section class="characteristics__container">
        <table class="table">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">DESCRIPCION</th>
                                <th scope="col">CANTIDAD</th>
                            </tr>
            <?php
            //$pre= mysqli_query($con, "truncate aux2");
            
            //mysqli_query($con, "call cantidadS");
            $result = mysqli_query($con, " SELECT * FROM `InventarioSum`");
            while ($row = mysqli_fetch_assoc($result)) {
                
            ?>
            <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <th><?php echo $row['Nombre']?></th>
                        <th><?php echo $row['Descripcion']?></th>
                        <th><?php echo $row['cantidad']; ?></th>
            </tr>
                        
                                
                        
                <?php }
            mysqli_close($con);
                ?>
                </table>
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