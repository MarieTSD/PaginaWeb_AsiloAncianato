<?php
session_start();
error_reporting(0);

include('db.php');

$serv = 'localhost';
$cuenta = 'root';
$contra = '';
$BaseD = 'ancianato';

//Variables de session
$_SESSION['idS'] = '';
$_SESSION['idD'] = '';
$_SESSION['cant'] = '';
$_SESSION['nom'] = '';
$_SESSION['apo'] = '';

//Realiar la conexion con la base de datos 
$conexion = new mysqli($serv, $cuenta, $contra, $BaseD);
if ($conexion->connect_error) {
    die('Ocurrio un error en la conexion con la BD');
} else {
    $modificar = $_SESSION['mod'];
    $modificar2 = $_SESSION['mod2'];
    $sql2 = "select * from Data_AparcenSD where Codigo_Suministro='$modificar' and ID_Donacion='$modificar2'"; //hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
    $resultado = $conexion->query($sql2); //aplicamos sentencia  
    while ($fila = $resultado->fetch_assoc()) {
        $_SESSION['idS'] = $fila['Codigo_Suministro'];
        $_SESSION['idD'] = $fila['ID_Donacion'];
        $_SESSION['cant'] = $fila['Cantidad'];
        $_SESSION['nom'] = $fila['Nombre'];
        $_SESSION['apo'] = $fila['Aporte'];
    }
    if (isset($_POST['submit'])) {
        $uno = $_POST["idS"];
        $dos = $_POST["idD"];
        $tres = $_POST["cant"];
        $modificar = $_SESSION["mod"];
        $modificar2 = $_SESSION["mod2"];
        $ne = "update aparecen_sd set Codigo_Suministro='$uno', ID_Donacion='$dos', Cantidad='$tres' where Codigo_Suministro='$modificar' and ID_Donacion='$modificar2'";

        $fin = $conexion->query($ne);
        if ($conexion->affected_rows >= 1) {
            $_SESSION['exito2'] = "si";
            header("Location: actualizar_aparecen_sd.php");
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
            <a class="btn btn-outline-light" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a>
        </div>
    </nav>

    <section class="bg-dark text-white h-20 " style="height:20%;">
        <div class="container text-center pt-5">
            <h2 class="mb-2 pt-5">ACTUALIZAR CAMPOS SUMINISTROS EN DONACIONES</h2>
        </div>
    </section>

    <section class="hero3">
        <form class="contact100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post" id="alta">
            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Suministro: </span>
                <select name="idS" id="idS" class="input100">
                    <option value="<?php echo $_SESSION['idS']; ?>"><?php echo $_SESSION['idS'], " - ", $_SESSION['nom']; ?></option>
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
                    <option value="<?php echo $_SESSION['idD']; ?>"><?php echo $_SESSION['idD'], " - ", $_SESSION['apo']; ?></option>
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

            <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                <span class="label-input100">Cantidad: </span>
                <input class="input100" type="number" name="cant" value="<?php echo $_SESSION['cant']; ?>" required>
                <span class="focus-input100"></span>
            </div>

            <div class="container-contact100-form-btn p-1">
                <button class="btn btn-outline-info w-50 p-3 m-1" name="submit">
                    <span>
                        ACTUALIZAR SUMINISTRO
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