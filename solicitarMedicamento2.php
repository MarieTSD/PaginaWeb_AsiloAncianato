<?php
session_start();
error_reporting(0);

include('db.php');

$serv = 'localhost';
$cuenta = 'root';
$contra = '';
$BaseD = 'ancianato';

//Variables de session
$_SESSION['idR'] = '';
$_SESSION['Nombre'] = '';
$_SESSION['Des'] = '';
$_SESSION['Via'] = '';
$_SESSION['Existencia'] = '';

//Realiar la conexion con la base de datos 
$conexion = new mysqli($serv, $cuenta, $contra, $BaseD);
if ($conexion->connect_error) {
    die('Ocurrio un error en la conexion con la BD');
} else {
    $modificar = $_SESSION['mod'];
    $sql2 = "select * from Medicina where ID = '$modificar'"; //hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
    $resultado = $conexion->query($sql2); //aplicamos sentencia  
    while ($fila = $resultado->fetch_assoc()) {
        $_SESSION['idR'] = $fila['ID'];
        $_SESSION['Nombre'] = $fila['Nombre'];
        $_SESSION['Des'] = $fila['Descripcion'];
        $_SESSION['Via'] = $fila['Via'];
        $_SESSION['Existencia'] = $fila['Existencia'];
    }
    if (isset($_POST['submit'])) {
        $cuatro = $_SESSION["Existencia"] - $_POST["exist"];
        $modificar = $_SESSION["mod"];
        $ne = "update medicina set Existencia='$cuatro' where ID='$modificar'";

        $fin = $conexion->query($ne);
        if ($conexion->affected_rows >= 1) {
            $_SESSION['exito2'] = "si";
            header("Location: solicitarMedicamento.php");
        } else {
            $_SESSION['exito2'] = "no";
            header("Location: solicitarMedicamento.php");
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
            <h2 class="mb-2 pt-5">CONFIRMAR MEDICAMENTO</h2>
        </div>
    </section>

    <section class="m-5">
        <table class="table w-100 align-items-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Via</th>
                    <th scope="col">Existencia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result2 = mysqli_query($con, "SELECT * FROM `Medicina` where ID='$modificar'");
                while ($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                    <tr>
                        <td><?php echo $row2['ID']; ?></td>
                        <td><?php echo $row2['Nombre']; ?></td>
                        <td><?php echo $row2['Descripcion']; ?></td>
                        <td><?php echo $row2['Via']; ?></td>
                        <td><?php echo $row2['Existencia']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <section class="hero3">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="validate-input; contact100-form validate-form;" data-validate="Requerido" style="display: inline-flex;">
                                <p class="hero__paragraph">Ingresa la cantidad a solicitar: </p>
                                <input class="input100 w-25 h-25 ml-3" type="number" name="exist" placeholder="2">
                                <span class="focus-input100"></span>
                            </div>
                            <div class="contact100-form validate-form">
                                <button class="btn btn-outline-info w-50 p-2 m-1" name="submit">
                                    <span>
                                        SOLICITAR
                                        <i class="fan fan-long-arrow-right m-l-7" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </section>
                </tr>
            </tfoot>
        </table>
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