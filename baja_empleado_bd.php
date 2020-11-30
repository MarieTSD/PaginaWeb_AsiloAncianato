<?php
//Admin
session_start();
error_reporting(0);

//conexion a la base de datos
$serv = 'localhost';
$cuenta = 'root';
$contra = '';
$BaseD = 'ancianato';

//varibales para la consulta
//Variables de session
$_SESSION['id'] = '';
$_SESSION['nombre'] = '';
$_SESSION['apellido_p'] = '';
$_SESSION['apellido_m'] = '';
$_SESSION['fecha_nac'] = '';
$_SESSION['calleno'] = '';
$_SESSION['colonia'] = '';
$_SESSION['cp'] = '';
$_SESSION['ciudad'] = '';
$_SESSION['estado'] = '';
$_SESSION['telefono'] = '';
$_SESSION['sueldo'] = '';
$_SESSION['tipo'] = '';

//Realiar la conexion con la base de datos 
$conexion = new mysqli($serv, $cuenta, $contra, $BaseD);
if ($conexion->connect_error) {
    die('Ocurrio un error en la conexion con la BD');
} else {
    $modificar = $_SESSION['mod'];
    $sql2 = "select * from empleado where ID='$modificar'"; //hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
    $resultado = $conexion->query($sql2); //aplicamos sentencia  
    while ($fila = $resultado->fetch_assoc()) {
        $_SESSION['id'] = $fila['ID'];
        $_SESSION['nombre'] = $fila['Nombre'];
        $_SESSION['apellido_p'] = $fila['Apellido_P'];
        $_SESSION['apellido_m'] = $fila['Apellido_M'];
        $_SESSION['fecha_nac'] = $fila['Fecha_Nac'];
        $_SESSION['calleno'] = $fila['CalleNo'];
        $_SESSION['colonia'] = $fila['Colonia'];
        $_SESSION['cp'] = $fila['CP'];
        $_SESSION['ciudad'] = $fila['Ciudad'];
        $_SESSION['estado'] = $fila['Estado'];
        $_SESSION['telefono'] = $fila['Telefono'];
        $_SESSION['sueldo'] = $fila['Sueldo'];
        $_SESSION['tipo'] = $fila['Tipo'];
    }
    if (isset($_POST['submit2'])) {
        header("Location:baja_empleado.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Ancianato</title>
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
            <h2 class="mb-2 pt-5">CONFIRMAR BAJA EMPLEADO</h2>
        </div>
    </section>

    <?php
    if (isset($_POST['submit'])) {
        $modificar = $_SESSION["mod"];
        //hacemos cadena con la sentencia mysql para insertar datos
        echo '
            <script>
                swal({
                    title: "¿Estas seguro de eliminarlo?",
                    text: "Una vez eliminado, no se podra recuperar",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        swal("Eliminado", { icon: "success"});
                        document.location="baja_emp.php";
                    } else {
                        swal("No eliminado");
                        document.location="baja_empleado_bd.php";  
                    }
                });
            </script>';
    }
    ?>

    <section class="hero3">
        <p class="">Datos a eliminar:</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table class="table table-hover table-bordered w-50">
                <tr>
                    <td>ID: </td>
                    <td><?php echo $_SESSION['id']; ?></td>
                </tr>
                <tr>
                    <td>Nombre: </td>
                    <td><?php echo $_SESSION['nombre']; ?></td>
                </tr>
                <tr>
                    <td>Apellido paterno: </td>
                    <td><?php echo $_SESSION['apellido_p']; ?></td>
                </tr>
                <tr>
                    <td>Apellido materno: </td>
                    <td><?php echo $_SESSION['apellido_m']; ?></td>
                </tr>
                <tr>
                    <td>Fecha de nacimiento: </td>
                    <td><?php echo $_SESSION['fecha_nac']; ?></td>
                </tr>
                <tr>
                    <td>Calle y No.: </td>
                    <td><?php echo $_SESSION['calleno']; ?></td>
                </tr>
                <tr>
                    <td>Colonia: </td>
                    <td><?php echo $_SESSION['colonia']; ?></td>
                </tr>
                <tr>
                    <td>Codigo postal: </td>
                    <td><?php echo $_SESSION['cp']; ?></td>
                </tr>
                <tr>
                    <td>Ciudad: </td>
                    <td><?php echo $_SESSION['ciudad']; ?></td>
                </tr>
                <tr>
                    <td>Estado: </td>
                    <td><?php echo $_SESSION['estado']; ?></td>
                </tr>
                <tr>
                    <td>Telefono: </td>
                    <td><?php echo $_SESSION['telefono']; ?></td>
                </tr>
                <tr>
                    <td>Sueldo: </td>
                    <td><?php echo $_SESSION['sueldo']; ?></td>
                </tr>
                <tr>
                    <td>Tipo: </td>
                    <td><?php echo $_SESSION['tipo']; ?></td>
                </tr>
            </table>
            <div class="container-contact100-form-btn; contact100-form validate-form">
                <button class="btn btn-outline-danger w-50 p-3 m-1" name="submit">
                    <span>
                        ELIMINAR EMPLEADO
                        <i class="fan fan-long-arrow-right w-50 m-l-7" aria-hidden="true"></i>
                    </span>
                </button>
                <button class="btn btn-outline-info w-25 p-3 m-1" name="submit2">
                    <span>
                        REGRESAR
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