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
    $_SESSION['id']; 
    $_SESSION['aporte'];
    $_SESSION['fecha'];
    $_SESSION['hora'];
    $_SESSION['residente'];
    $_SESSION['benefactor'];   
    
    $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);
    if($conexion->connect_error){
        die('Ocurrio un error en la conexion con la BD');
    }else{
        $modificar = $_SESSION['mod']; 
        $sql2 = "select * from donacion where ID='$modificar'";//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
        $resultado = $conexion -> query($sql2);
        while( $fila = $resultado -> fetch_assoc() ){
            $_SESSION['id']=$fila['ID'];
            $_SESSION['aporte'] = $fila['Aporte'];
            $_SESSION['fecha'] = $fila['Fecha'];
            $_SESSION['hora'] = $fila['Hora'];
            $_SESSION['residente'] = $fila['ID_Residente'];
            $_SESSION['benefactor'] = $fila['ID_Benefactor'];
        } 
        if(isset($_POST['submit2'])){
            header("Location:baja_donacion.php");
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
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            DONACION
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="alta_donacion.php">ALTA</a>
                            <a class="dropdown-item" href="baja_donacion.php">BAJA</a>
                            <a class="dropdown-item" href="actualizar_donacion.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="visualizar_donacion.php">VISUALIZAR</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">MEDICAMENTO</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">CLASE</a></li>
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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">SUMINISTRO</a></li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Expediente Cinico
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="AlExpClinico.php">ALTA</a>
                            <a class="dropdown-item" href="BExpClinico">BAJA</a>
                            <a class="dropdown-item" href="AExpClinico.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="VExpClinico">VISUALIZAR</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">SUMINISTRO</a></li>
                </ul>
            </div>
        </div>
    </nav>
        <!-- Call to action-->
        <section class="bg-primary text-white h-25">
            <div class="container text-center pt-5">
                <h2 class="mb-2 pt-5">CONFIRMAR BAJA DONACION</h2>
            </div>
        </section>

        <?php
            if(isset($_POST['submit'])){
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
                        document.location="bajaD.php";
                    } else {
                        swal("No eliminado");
                        document.location="baja_donacionbase.php";  
                    }
                });
            </script>';
            }
        ?>

        <section class="hero3">
            <p class="">Datos a eliminar:</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <table class="table table-hover table-bordered w-50">
                    <tr>
                        <td>ID: </td>
                        <td><?php echo $_SESSION['id']; ?></td>
                    </tr>
                    <tr>
                        <td>Aportacion: </td>
                        <td><?php echo $_SESSION['aporte']; ?></td>
                    </tr>
                    <tr>
                        <td>Fecha: </td>
                        <td><?php echo $_SESSION['fecha']; ?></td>
                    </tr>
                    <tr>
                        <td>Hora: </td>
                        <td><?php echo $_SESSION['hora']; ?></td>
                    </tr>
                    <tr>
                        <td>ID del Residente : </td>
                        <td><?php echo $_SESSION['residente']; ?></td>
                    </tr>
                    <tr>
                        <td>ID del Benefactor: </td>
                        <td><?php echo $_SESSION['benefactor']; ?></td>
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
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div></div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>