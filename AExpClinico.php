<?php
//Admin
session_start();
include('db.php');
error_reporting(0);
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
    <script type="text/javascript" src="JS/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="JS/actions.js"></script>
    <script type="text/javascript" src="JS/expediente_clinico.js"></script>
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
                            EXPEDIENTE CLINICO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="AlExpClinico.php">ALTA</a>
                            <a class="dropdown-item" href="BExpeClinico.php">BAJA</a>
                            <a class="dropdown-item" href="AExpClinico.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="VExpeClinico.php">VISUALIZAR</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="solicitarMedicamento.php" role="button">SOLICITAR MEDICAMENTO</a>
                    </li>
                </ul>
            </div>
           <!--  <a class="btn btn-outline-light ml-4" href="#"><span class="glyphicon glyphicon-user"></span> LOGIN</a>-->
          <a class="btn btn-outline-light" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a>
        </div>
    </nav>

    <section class="bg-dark text-white h-20 " style="height:20%;">
        <div class="container text-center pt-5">
            <h2 class="mb-2 pt-5">ACTUALIZAR EXPEDIENTE CLINICO</h2>
        </div>
    </section>

    <!--Dialogo-->
    <?php
    if ($_SESSION['exito2'] == "si") {
        echo '<script>swal("Actualizacion Exitosa", "Los cambios se guardaron", "success");</script>';
        $_SESSION['exito2'] = "";
    }
    ?>

    <section class="hero3 hero7">
        <p class="hero__paragraph">Ingresa id a actualizar: </p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Residente: </span>
                <select name="idR" id="idR" class="input100">
                    <option value="Selecciona un residente">Selecciona un residente</option>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM `DataResidente`");
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['ID']; ?>">
                            <?php echo $row['ID'], " - ", $row['NombreCompleto']; ?>
                        </option>
                    <?php }
                    //mysqli_close($con);
                    ?>
                </select>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Residente: </span>
                <select name="idM" id="idM" class="input100">
                    <option value="Selecciona un residente">Selecciona una Medicina</option>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM `Medicina`");
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['ID']; ?>">
                            <?php echo $row['ID'], " - ", $row['Nombre']; ?>
                        </option>
                    <?php }
                    //mysqli_close($con);
                    ?>
                </select>
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Residente: </span>
                <select name="idA" id="idA" class="input100">
                    <option value="Selecciona un residente">Selecciona la Atencion Medica</option>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM `Atencion_Medica`");
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['ID']; ?>">
                            <?php echo $row['ID'], " - ", $row['Nombre']; ?>
                        </option>
                    <?php }
                    //mysqli_close($con);
                    ?>
                </select>
                <span class="focus-input100"></span>
            </div>
            <div class="contact100-form validate-form">
                <button class="btn btn-outline-info w-50 p-3 m-1" name="submit">
                    <span>
                        BUSCAR EXPEDIENTE CLINICO
                        <i class="fan fan-long-arrow-right m-l-7" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
        </form>
    </section>

    <?php
    //conexion a la base de datos
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
            $modificar = $_POST['idR'];
            $modificar2 = $_POST['idM'];
            $modificar3 = $_POST['idA'];
            $_SESSION['mod'] = $modificar;
            $_SESSION['mod2'] = $modificar2;
            $_SESSION['mod3'] = $modificar3;
            $sql2 = "SELECT * FROM exp_clinico where ID_Residente='$modificar'
                    and ID_Medicina='$modificar2' and ID_Atencion_Medica='$modificar3'";

            //echo $sql2; 
            $resultado = $conexion->query($sql2); //aplicamos sentencia 
            $fila = $resultado->fetch_assoc();
            if ($fila) {
                echo "<script>document.location='AExpClinico_base.php';</script>";
            } else {
                echo '<script>swal("Id no encontrado", "El id que ingresaste no es existente", "error");</script>';
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