<?php
//Admin
session_start();
error_reporting(0);

//conexion a la base de datos
$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'ancianato';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);

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
                            <a class="dropdown-item" href="actualizar_aparecen_sd.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="ver_suministro.php">VISUALIZAR</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            SUMINISTROS EN DONACIONES
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="altas_aparecen_sd.php">ALTA</a>
                            <a class="dropdown-item" href="baja_aparecen_sd.php">BAJA</a>
                            <a class="dropdown-item" href="actualizar_aparecen_sd.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="ver_aparecen_sd.php">VISUALIZAR</a>
                        </div>
                    </li>
                </ul>
            </div>
            <a class="btn btn-outline-light ml-4" href="#"><span class="glyphicon glyphicon-user"></span> LOGIN</a>
            <a class="btn btn-outline-light" href="#"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a>
        </div>
    </nav>

    <section class="bg-dark text-white h-20 " style="height:20%;">
        <div class="container text-center pt-5">
            <h2 class="mb-2 pt-5">ACTUALIZAR SUMINISTROS EN DONACIONES</h2>
        </div>
    </section>

    <?php
    if ($_SESSION['exito2'] == "si") {
        echo '<script>swal("Actualizacion Exitosa", "Continua Actualizando", "success");</script>';
        $_SESSION['exito2'] = "";
    }
    ?>

    <section class="hero3 hero8">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Suministro: </span>
                <select name="idS" id="idS" class="input100">
                    <option value="">Selecciona un suministro</option>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM `suministro`");
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['Codigo']; ?>">
                            <?php echo $row['Codigo'], " - ", $row['Nombre']; ?>
                        </option>
                    <?php }
                    //mysqli_close($con);
                    ?>
                </select>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Donacion: </span>
                <select name="idD" id="idD" class="input100">
                    <option value="">Selecciona una donacion</option>
                    <?php
                    $result2 = mysqli_query($con, "SELECT * FROM `donacion`");
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                    ?>
                        <option value="<?php echo $row2['ID']; ?>">
                            <?php echo $row2['ID'], " - ", $row2['Aporte']; ?>
                        </option>
                    <?php }
                    mysqli_close($con2);
                    ?>
                </select>
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn; contact100-form validate-form">
                <button class="btn btn-outline-info w-50 p-3 m-1" name="submit">
                    <span>
                        BUSCAR SUMINISTRO
                        <i class="fan fan-long-arrow-right m-l-7" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
        </form>
    </section>

    <?php
    $serv = 'localhost';
    $cuenta = 'root';
    $contra = '';
    $BaseD = 'ancianato';

    //Realiar la conexion con la base de datos 
    $conexion = new mysqli($serv, $cuenta, $contra, $BaseD);
    if ($conexion->connect_error) {
        die('Ocurrio un error en la conexion con la BD');
    } else {
        if (isset($_POST['submit'])) {
            $modificar = $_POST['idS'];
            $modificar2 = $_POST['idD'];
            $_SESSION['mod'] = $modificar;
            $_SESSION['mod2'] = $modificar2;
            $sql2 = "select * from aparecen_sd where Codigo_Suministro='$modificar' and ID_Donacion='$modificar2'"; //hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
            $resultado = $conexion->query($sql2); //aplicamos sentencia  
            $fila = $resultado->fetch_assoc();
            if ($fila) {
                echo "<script>
                        document.location='actualizar_aparecen_sd_bd.php';
                      </script>";
            } else {
                echo '<script>swal("Campo no encontrado", "El id que introduciste no esta asosciado a ningun atributo", "error");</script>';
            }
        }
    }
    ?>

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