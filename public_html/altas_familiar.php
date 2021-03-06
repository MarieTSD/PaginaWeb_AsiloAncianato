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
    <!--clases-->
    <script type="text/javascript" src="JS/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="JS/actions.js"></script>
    <script type="text/javascript" src="JS/Personas.js"></script>
    <script type="text/javascript" src="JS/domicilio_tel.js"></script>
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
            <a class="btn btn-outline-light" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a>
        </div>
    </nav>

    <section class="bg-dark text-white h-20 " style="height:20%;">
        <div class="container text-center pt-5">
            <h2 class="mb-2 pt-5">ALTA FAMILIAR</h2>
        </div>
    </section>

    <?php
    if ($_SESSION['exito'] == "si") {
        echo '<script>swal("Alta Exitosa", "Continua dando de alta", "success");</script>';

        $_SESSION['exito'] = "";
    } else if ($_SESSION['exito'] == "no") {
        echo '<script>swal("ID Repetido", "El id debe ser unico", "error");</script>';
        $_SESSION['exito'] = "";
    } else if ($_SESSION['exito'] == "x") {
        echo '<script>swal("ID de residente incorrecto", "El id no existe", "error");</script>';
    }
    ?>

    <div class="hero3">
        <form action="" id="form">
            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Nombre(s):</span>
                <input class="input100" type="text" id="nomA" name="nomA" placeholder="Luis" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Apellido paterno:</span>
                <input class="input100" type="text" id="apA" name="apA" placeholder="Flores" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1">
                <span class="label-input100">Apellido materno:</span>
                <input class="input100" type="text" id="amA" name="amA" placeholder="Serna">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Fecha de nacimiento:</span>
                <input class="input100" type="date" id="anoNA" name="anoNA" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Parentezco:</span>
                <input class="input100" type="text" id="paren" name="paren" placeholder="" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Calle y No.:</span>
                <input class="input100" type="text" id="calleA" name="calleA" placeholder="" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Colonia:</span>
                <input class="input100" type="text" id="coloniaA" name="coloniaA" placeholder="" required>
                <span class="focus-input100"></span>
                <span class="label-input100">CP:</span>
                <input class="input100" type="number" id="cpA" name="cpA" placeholder="" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Ciudad:</span>
                <input class="input100" type="text" id="ciudadA" name="ciudadA" placeholder="Aguascalientes" required>
                <span class="focus-input100"></span>
                <span class="label-input100">Estado:</span>
                <input class="input100" type="text" id="estadoA" name="estadoA" placeholder="Aguascalientes" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Telefono:</span>
                <input class="input100" type="number" id="telA" name="telA">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Residente: </span>
                <select name="idR" id="idR" class="input100">
                    <option value="">Selecciona un residente</option>
                    <?php
                    $result2 = mysqli_query($con, "SELECT * FROM `DataResidente`");
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                    ?>
                        <option value="<?php echo $row2['ID']; ?>">
                            <?php echo $row2['ID'], " - ", $row2['NombreCompleto']; ?>
                        </option>
                    <?php }
                    mysqli_close($con2);
                    ?>
                </select>
                <span class="focus-input100"></span>
            </div>
            <div class="container-contact100-form-btn p-1">
                <button class="btn btn-outline-info w-50 p-3 m-1" onclick="getDatafam()" name="submit">
                    <span>
                        AGREGAR
                        <i class="fan fan-long-arrow-right m-l-7" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
        </form>
    </div>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">Copyright © 2020 - Copyright © 2020 - Ancianato. El mejor tiempo de vida.</div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>