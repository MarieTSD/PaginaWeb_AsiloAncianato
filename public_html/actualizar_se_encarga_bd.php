<?php
session_start();
error_reporting(0);

include('db.php');

$serv = 'localhost';
$cuenta = 'root';
$contra = '';
$BaseD = 'ancianato';

//Variables de session
$_SESSION['idA'] = '';
$_SESSION['idE'] = '';
$_SESSION['idR'] = '';
$_SESSION['fecha'] = '';
$_SESSION['hora'] = '';
$_SESSION['fnE'] = '';
$_SESSION['fnR'] = '';

//Realiar la conexion con la base de datos 
$conexion = new mysqli($serv, $cuenta, $contra, $BaseD);
if ($conexion->connect_error) {
    die('Ocurrio un error en la conexion con la BD');
} else {
    $modificar = $_SESSION['mod'];
    $sql2 = "select * from Data_SeEncarga where ID = '$modificar'"; //hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
    $resultado = $conexion->query($sql2); //aplicamos sentencia  
    while ($fila = $resultado->fetch_assoc()) {
        $_SESSION['idA'] = $fila['ID'];
        $_SESSION['idE'] = $fila['ID_Empleado'];
        $_SESSION['fnE'] = $fila['FullNameEmpleado'];
        $_SESSION['idR'] = $fila['ID_Residente'];
        $_SESSION['fnR'] = $fila['FullNameResidente'];
        $_SESSION['fecha'] = $fila['fecha'];
        $_SESSION['hora'] = $fila['hora'];
    }
    if (isset($_POST['submit'])) {
        $cero = $_POST["idA"];
        $uno = $_POST["idE"];
        $dos = $_POST["idR"];
        $tres = $_POST["fechaA"];
        $cuatro = $_POST["horaA"];
        $modificar = $_SESSION["mod"];
        $ne = "update se_encarga set ID='$cero', ID_Empleado='$uno', ID_Residente='$dos', Fecha='$tres', Hora='$cuatro' where ID='$modificar'";

        $fin = $conexion->query($ne);
        if ($conexion->affected_rows >= 1) {
            $_SESSION['exito2'] = "si";
            header("Location: actualizar_se_encarga.php");
        }else{
            $_SESSION['exito2'] = "no";
            header("Location: actualizar_se_encarga.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Ancianato</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="css/style.css">
    <link href="css/styles.css" rel="stylesheet" />
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
            <h2 class="mb-2 pt-5">ACTUALIZAR CAMPOS SE_ENCARGA</h2>
        </div>
    </section>

    <section class="hero3">
        <form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post" id="alta">
            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">ID: </span>
                <input class="input100" type="number" name="idA" value="<?php echo $_SESSION['idA']; ?>" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Empleado: </span>
                <select name="idE" id="idE" class="input100">
                    <option value="<?php echo $_SESSION['idE']; ?>"><?php echo $_SESSION['idE'], " - ", $_SESSION['fnE']; ?></option>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM `DataEmpleado`");
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
                <select name="idR" id="idR" class="input100">
                    <option value="<?php echo $_SESSION['idR']; ?>"><?php echo $_SESSION['idR'], " - ", $_SESSION['fnR']; ?></option>
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

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Fecha: </span>
                <input class="input100" type="date" name="fechaA" value="<?php echo $_SESSION['fecha']; ?>" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Hora: </span>
                <input class="input100" type="time" name="horaA" value="<?php echo $_SESSION['hora']; ?>" required>
                <span class="focus-input100"></span>
            </div>

            <div class="container-contact100-form-btn p-1">
                <button class="btn btn-outline-info w-50 p-3 m-1" name="submit">
                    <span>
                        ACTUALIZAR
                        <i class="fan fan-long-arrow-right m-l-7" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
        </form>
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