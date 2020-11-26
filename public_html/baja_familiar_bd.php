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
   $_SESSION['ap'] = '';
   $_SESSION['am'] = '';
   $_SESSION['nac']='';
   $_SESSION['paren']='';
   $_SESSION['calle']='';
   $_SESSION['colonia']='';
   $_SESSION['cp']='';
   $_SESSION['ciudad']='';
   $_SESSION['estado']='';
   $_SESSION['telefono']='';
   $_SESSION['idR']='';

    
    //Realiar la conexion con la base de datos 
    $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);
    if($conexion->connect_error){
        die('Ocurrio un error en la conexion con la BD');
    }else{
        $modificar = $_SESSION['mod']; 
        $sql2 = "select * from familiar where ID='$modificar'";//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
        $resultado = $conexion -> query($sql2); //aplicamos sentencia  
        while( $fila = $resultado -> fetch_assoc() ){
            $_SESSION['id']= $fila['ID'];
                $_SESSION['nombre'] = $fila['Nombre'];
                $_SESSION['ap'] = $fila['Apellido_P'];
                $_SESSION['am'] = $fila['Apellido_M'];
                $_SESSION['nac']=$fila['Fecha_Nac'];
                $_SESSION['paren']=$fila['Parentezco'];
                $_SESSION['calle']=$fila['CalleNo'];
                $_SESSION['colonia']=$fila['Colonia'];
                $_SESSION['cp']=$fila['CP'];
                $_SESSION['ciudad']=$fila['Cuidad'];
                $_SESSION['estado']=$fila['Estado'];
                $_SESSION['telefono']=$fila['Telefono'];
                $_SESSION['idR']=$fila['ID_Residente'];
        } 
        if(isset($_POST['submit2'])){
            header("Location:baja_familiar.php");
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
                                <a class="dropdown-item" href="#">ACTUALIZAR</a>
                                <a class="dropdown-item" href="#">VISUALIZAR</a>
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
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">CONFIRMAR BAJA BENEFACTOR</h2>
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
                        document.location="baja_fam.php";
                    } else {
                        swal("No eliminado");
                        document.location="baja_familiar_bd.php";  
                    }
                });
            </script>';
            }
        ?>

        <section class="container">
            <p class="">Datos a eliminar:</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td>ID: </td>
                        <td><?php echo $_SESSION['id']; ?></td>
                    </tr>
                    <tr>
                        <td>Nombre: </td>
                        <td><?php echo $_SESSION['nombre']; ?></td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno: </td>
                        <td><?php echo $_SESSION['ap']; ?></td>
                    </tr>
                    <tr>
                        <td>Apellido Materno: </td>
                        <td><?php echo $_SESSION['am']; ?></td>
                    </tr>
                    <tr>
                        <td>Fecha Nacimiento </td>
                        <td><?php echo $_SESSION['nac']; ?></td>
                    </tr>
                    <tr>
                        <td>Parentezco: </td>
                        <td><?php echo $_SESSION['paren']; ?></td>
                    </tr>
                    <tr>
                        <td>Calle y No.: </td>
                        <td><?php echo $_SESSION['calle']; ?></td>
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
                        <td>Id Residente: </td>
                        <td><?php echo $_SESSION['idR']; ?></td>
                    </tr>
                    
                </table>
                <div class="container-contact100-form-btn; contact100-form validate-form">
					<button class="contact100-form-btn" name="submit">
						<span>
							Eliminar
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
					<button class="contact100-form-btn" name="submit2">
						<span>
							Regresar
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
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