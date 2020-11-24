<?php
    //Admin
    session_start();

    error_reporting(0);
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
        <link rel="stylesheet" href="css/style.css">
        <link href="css/styles.css" rel="stylesheet" />
        <!--  Para el los menajes de confimacion ets-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body >
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

        <!-- Encabezado-->
        <section class="bg-primary text-white h-25">
            <div class="container text-center pt-5">
                <h2 class="mb-2 pt-5">BAJA EMPLEADO</h2>
            </div>
        </section>

        <!--Dialogo-->
        <?php
            if($_SESSION['exito1'] == "si"){
                echo '<script>swal("Baja Exitosa", "Los cambios se guardaron", "success");</script>';
                $_SESSION['exito1'] = "";
            }
        ?>

        <section class="hero3 hero7">
            <p class="hero__paragraph">Ingresa id a eliminar: </p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="wrap-input100 validate-input; contact100-form validate-form;" data-validate="Requerido">
                    <input class="input100" type="number" name="idA" placeholder="Ingresa id">
                    <span class="focus-input100"></span>
                </div>
                <div class="contact100-form validate-form">
                    <button class="btn btn-outline-info w-50 p-3 m-1" name="submit">
						<span>
							BUSCAR EMPLEADO
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
            $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);
            if($conexion->connect_error){
                die('Ocurrio un error en la conexion con la BD');
            }else{
                if(isset($_POST['submit'])){
                    $modificar = $_POST['idA'];
                    $_SESSION['mod']=$modificar;
                    $sql2 = "select * from empleado where ID='$modificar'";//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
                    $resultado = $conexion -> query($sql2); //aplicamos sentencia 
                    $fila = $resultado -> fetch_assoc();
                    if($fila){
                        echo "<script>document.location='baja_empleado_bd.php';</script>";
                    }else{
                        echo '<script>swal("Id no encontrado", "El id que ingresaste no es existente", "error");</script>'; 
                    }
                }
            }
        ?>
 
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div></div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
