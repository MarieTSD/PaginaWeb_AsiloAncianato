<?php
//Admin
session_start();
error_reporting(0);

//conexion a la base de datos
$serv = 'localhost';
$cuenta = 'root';
$contra = '';
$BaseD = 'ancianato';

//variables de sesion
$_SESSION['idR'];
$_SESSION['idM'];
$_SESSION['idA'];
$_SESSION['dosis'];
$_SESSION['motivo'];
$_SESSION['fecha'];

$conexion = new mysqli($serv, $cuenta, $contra, $BaseD);
if ($conexion->connect_error) {
    die('Ocurrio un error en la conexion con la BD');
} else {
    $modificar = $_SESSION['mod'];
    $modificar2 = $_SESSION['mod2'];
    $modificar3 = $_SESSION['mod3'];
    $sql2 = "SELECT * FROM exp_clinico where ID_Residente='$modificar'
        and ID_Medicina='$modificar2' and ID_Atencion_Medica='$modificar3'";

    $resultado = $conexion->query($sql2);
    while ($fila = $resultado->fetch_assoc()) {
        $_SESSION['idR'] = $fila['ID_Residente'];
        $_SESSION['idM'] = $fila['ID_Medicina'];
        $_SESSION['idA'] = $fila['ID_Atencion_Medica'];
        $_SESSION['dosis'] = $fila['Dosis'];
        $_SESSION['motivo'] = $fila['Motivo'];
        $_SESSION['fecha'] = $fila['Fecha'];
    }
    if (isset($_POST['submit2'])) {
        header("Location:BExpeClinico.php");
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
            <a class="btn btn-outline-light ml-4" href="#"><span class="glyphicon glyphicon-user"></span> LOGIN</a>
            <a class="btn btn-outline-light" href="#"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a>
        </div>
    </nav>

    <section class="bg-dark text-white h-20 " style="height:20%;">
        <div class="container text-center pt-5">
            <h2 class="mb-2 pt-5">CONFRIRMAR BAJA EXPEDIENTE CLINICO</h2>
        </div>
    </section>
    <?php
    if (isset($_POST['submit'])) {
        $modificar = $_SESSION["idR"];
        $modificar2 = $_SESSION['idM'];
        $modificar3 = $_SESSION['idA'];
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
                        document.location="bExpClin.php";
                    } else {
                        swal("No eliminado");
                        document.location="BExpeClinico_base.php";  
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
                    <td>ID RESIDENTE: </td>
                    <td><?php echo $_SESSION['idR']; ?></td>
                </tr>
                <tr>
                    <td>ID MEDICINA: </td>
                    <td><?php echo $_SESSION['idM']; ?></td>
                </tr>
                <tr>
                    <td>ID ATENCION MEDICA: </td>
                    <td><?php echo $_SESSION['idA']; ?></td>
                </tr>
                <tr>
                    <td>Hora: </td>
                    <td><?php echo $_SESSION['dosis']; ?></td>
                </tr>
                <tr>
                    <td>Motivo : </td>
                    <td><?php echo $_SESSION['motivo']; ?></td>
                </tr>
                <tr>
                    <td>Fecha: </td>
                    <td><?php echo $_SESSION['fecha']; ?></td>
                </tr>

            </table>
            <div class="container-contact100-form-btn; contact100-form validate-form">
                <button class="btn btn-outline-danger w-50 p-3 m-1" name="submit">
                    <span>
                        ELIMINAR
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