<?php
session_start();
error_reporting(0);

include('db.php');

$serv = 'localhost';
$cuenta = 'root';
$contra = '';
$BaseD = 'ancianato';

//Variables de session
$_SESSION['idC'] = '';
$_SESSION['idR'] = '';
$_SESSION['Fecha'] = '';
$_SESSION['Hora'] = '';
$_SESSION['des'] = '';
$_SESSION['fnR'] = '';

//Realiar la conexion con la base de datos 
$conexion = new mysqli($serv, $cuenta, $contra, $BaseD);
if ($conexion->connect_error) {
    die('Ocurrio un error en la conexion con la BD');
} else {
    $modificar = $_SESSION['mod'];
    $modificar2 = $_SESSION['mod2'];
    $sql2 = "select * from Data_Inscrito where ID_Clase='$modificar' and ID_Residente='$modificar2'"; //hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
    $resultado = $conexion->query($sql2); //aplicamos sentencia  
    while ($fila = $resultado->fetch_assoc()) {
        $_SESSION['idC'] = $fila['ID_Clase'];
        $_SESSION['des'] = $fila['Descripcion'];
        $_SESSION['idR'] = $fila['ID_Residente'];
        $_SESSION['fnR'] = $fila['FullNameResidente'];
        $_SESSION['Fecha'] = $fila['Fecha'];
        $_SESSION['Hora'] = $fila['Hora'];
    }
    if (isset($_POST['submit'])) {
        $uno = $_POST["idC"];
        $dos = $_POST["idR"];
        $tres = $_POST["fecha"];
        $cuatro = $_POST["hora"];
        $modificar = $_SESSION["mod"];
        $modificar2 = $_SESSION["mod2"];
        $ne = "update inscrito set ID_Clase='$uno', ID_Residente='$dos', Fecha='$tres', Hora='$cuatro' where ID_Clase='$modificar' and ID_Residente='$modificar2'";

        $fin = $conexion->query($ne);
        if ($conexion->affected_rows >= 1) {
            $_SESSION['exito2'] = "si";
            header("Location: actualizar_asiste.php");
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
                            <a class="dropdown-item" href="ver_clase.php">LISTAS DE ALUMNOS</a>
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
            <a class="btn btn-outline-light ml-4" href="#"><span class="glyphicon glyphicon-user"></span> LOGIN</a>
            <a class="btn btn-outline-light" href="#"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a>
        </div>
    </nav>

    <section class="bg-dark text-white h-20 " style="height:20%;">
        <div class="container text-center pt-5">
            <h2 class="mb-2 pt-5">ACTUALIZAR CAMPOS INSCRIPCION</h2>
        </div>
    </section>

    <section class="hero3">
        <form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post" id="alta">
            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Clase: </span>
                <select name="idC" id="idC" class="input100">
                    <option value="<?php echo $_SESSION['idC']; ?>"><?php echo $_SESSION['idC'], " - ", $_SESSION['des']; ?></option>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM `clase`");
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['ID']; ?>">
                            <?php echo $row['ID'], " - ", $row['Descripcion']; ?>
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
                <span class="label-input100">Fecha de inscripcion: </span>
                <input class="input100" type="date" id="fechaA" name="fecha" value="<?php echo $_SESSION['Fecha']; ?>" placeholder="20" required>
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Hora: </span>
                <input class="input100" type="time" id="horaA" name="hora" value="<?php echo $_SESSION['Hora']; ?>" placeholder="20" required>
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