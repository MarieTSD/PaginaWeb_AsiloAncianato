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
    $_SESSION['id']='';
    $_SESSION['nombre'] ='';
    $_SESSION['apellido_p'] = '';
    $_SESSION['apellido_m'] = '';
    $_SESSION['fecha_nac']='';
    $_SESSION['genero']='';
    $_SESSION['civil']='';
    
    //Realiar la conexion con la base de datos 
    $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);
    if($conexion->connect_error){
        die('Ocurrio un error en la conexion con la BD');
    }else{
        $modificar = $_SESSION['mod']; 
        $sql2 = "SELECT * from residente where ID='$modificar'";//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
        $resultado = $conexion -> query($sql2); //aplicamos sentencia  
        while( $fila = $resultado -> fetch_assoc() ){
            $_SESSION['id']=$fila['ID'];
            $_SESSION['nombre'] = $fila['Nombre'];
            $_SESSION['apellido_p'] = $fila['Apellido_P'];
            $_SESSION['apellido_m'] = $fila['Apellido_M'];
            $_SESSION['fecha_nac'] = $fila['Fecha_Nac'];
            $_SESSION['genero'] = $fila['Genero'];
            $_SESSION['civil'] = $fila['Estado_civil'];
        } 
        if(isset($_POST['submit2'])){
            header("Location:bResidente.php");
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
                <h2 class="mb-2 pt-5">CONFIRMAR BAJA RESIDENTE</h2>
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
                        document.location="bResi.php";
                    } else {
                        swal("No eliminado");
                        document.location="bResidente_base.php";  
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
                        <td>Genero: </td>
                        <td><?php echo $_SESSION['genero']; ?></td>
                    </tr>
                    <tr>
                        <td>Estado Civil : </td>
                        <td><?php echo $_SESSION['civil']; ?></td>
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