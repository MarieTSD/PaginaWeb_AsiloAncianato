<?php
//codigo de conexion
session_start();
error_reporting(0);
$serv = 'localhost';
$cuenta = 'root';
$contra = '';
$BaseD = 'ancianato';
$_SESSION['exito'] = "";

//Realiar la conexion con la base de datos 
$conexion = new mysqli($serv, $cuenta, $contra, $BaseD);
if ($conexion->connect_error) {
    die('Ocurrio un error en la conexion con la BD');
} else {

    //sacamos del formulario los datos
    //$id = $_POST['idD'];
    $aporte = $_POST['aporte'];
    $fecha = $_POST['fec'];
    $hora = $_POST['hr'];
    $residente = $_POST['id_residente'];
    $benefactor = $_POST['id_benefactor'];
    
    
    if ($residente == "0") {
        $sql = "INSERT INTO donacion ( Aporte, Fecha, Hora, ID_Benefactor) 
            VALUES('$aporte','$fecha','$hora','$benefactor')";
        $_SESSION['exito'] = "si";

    } else {
        $sql = "INSERT INTO donacion ( Aporte, Fecha, Hora, ID_Residente) 
                VALUES('$aporte','$fecha','$hora', '$residente')";
        $_SESSION['exito'] = "si";
    }
    $conexion->query($sql); //Agregamos la donacion a la base de datos
    $sql2 = "SELECT MAX(ID) FROM donacion";
    $resultado = $conexion->query($sql2); 
    while ($fila = $resultado->fetch_assoc()) {
        $_SESSION['id'] = $fila['MAX(ID)'];
    }
    
    /*if($result = $mysqli -> query($sql2)){
        $row2 = $result -> mysqli_fetch_row();
    }
    /*$conexion->query($sql2); 
    $row2 = mysqli_fetch_row($sql2);
    $_SESSION['id']=$row2['id'];  */

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
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 ml-2 w-100" id="mainNav">
        <div class="container ml-1">
            <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="img/logo5.png" class="logo" id="logo" alt=""></a>
            <a class="navbar-brand js-scroll-trigger mr-5" href="inicio_admin.php" style="font-size: 18px;">ADMIN</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse ml-5 text-center" id="navbarResponsive">
                <ul class="navbar-nav nav text-center mr-5">
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            DONACION
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="alta_donacion.php">ALTA</a>
                            <a class="dropdown-item" href="actualizar_donacion.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="visualizar_donacion.php">VISUALIZAR</a>
                            <a class="dropdown-item" href="familiar.php">DONACIONES POR FAMILIAR</a>
                            <a class="dropdown-item" href="benefactor.php">DONACIONES POR BENEFACTOR</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            FAMILIAR
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="altas_familiar.php">ALTA</a>
                            <a class="dropdown-item" href="baja_familiar.php">BAJA</a>
                            <a class="dropdown-item" href="actualizar_familiar.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="ver_familiar.php">VISUALIZAR</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown show">
                        <a class="nav-link js-scroll-trigger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            BENEFACTOR
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="altas_benefactor.php">ALTA</a>
                            <a class="dropdown-item" href="baja_benefactor.php">BAJA</a>
                            <a class="dropdown-item" href="actualizar_benefactor.php">ACTUALIZAR</a>
                            <a class="dropdown-item" href="ver_benefactor.php">VISUALIZAR</a>
                        </div>
                    </li>
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
                </ul>
            </div>
            <a class="btn btn-outline-light ml-4" href="#"><span class="glyphicon glyphicon-user"></span> LOGIN</a>
            <a class="btn btn-outline-light" href="#"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a>
        </div>
    </nav>

      <section class="bg-primary text-white h-25">
          <div class="container text-center pt-5">
              <h2 class="mb-2 pt-5">ALTA DONACION</h2>
          </div>
      </section>

      <section class="hero3">
          <form class="contact100-form validate-form" action="altaSM.php" enctype="multipart/form-data" method="post" id="alta">

              <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                  <span class="label-input100">ID:</span>
                  <!--<span class="label-input100"><?php echo $_SESSION['id']; ?></span>-->
                 <input class="input100" type="number" name="id" value="<?php echo $_SESSION['id']; ?>" />
                  <span class="focus-input100"></span>
              </div>

              <div class="container-contact100-form-btn p-1">
                  <span class="label-input100">Suministro:</span>
                  <select name="suministro" id="suministro" class="input100">
                      <option value="1">SELECCIONE SUMINISTRO</option>
                      <?php
                        $sql2 = $conexion->query("SELECT * from suministro");

                        while ($fila = $sql2->fetch_array()) {
                            echo "<option value='" . $fila['Codigo'] . "'>" . $fila['Nombre'] . "</option>";
                        }
                        ?>
                  </select>
              </div>

              <div class="container-contact100-form-btn p-1">
                  <span class="label-input100">Medicamento:</span>
                  <select name="medicamento" id="medicamento" class="input100">
                      <option value="1">SELECCIONE MEDICAMENTO</option>
                      <?php
                        $sql2 = $conexion->query("SELECT * from medicina");

                        while ($fila = $sql2->fetch_array()) {
                            echo "<option value='" . $fila['ID'] . "'>" . $fila['Nombre'] . "</option>";
                        }
                        ?>
                  </select>
              </div>

              <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                  <span class="label-input100">Cantidad Suministro:</span>
                  <input class="input100" type="number" name="idC">
                  <span class="focus-input100"></span>
              </div>

              <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                  <span class="label-input100">Cantidad Medicamento:</span>
                  <input class="input100" type="number" name="idMedic" >
                  <span class="focus-input100"></span>
              </div>

              <div class="container-contact100-form-btn p-1">
                  <button class="btn btn-outline-info w-50 p-3 m-1" name="submit">
                      <span>
                          AGREGAR 
                          <i class="fan fan-long-arrow-right m-l-7" aria-hidden="true"></i>
                      </span>
                  </button>
              </div>

              <div class="container-contact100-form-btn p-1">
                  <li class="btn btn-outline-info w-50 p-3 m-1" name="cancela">
                      <span>
                          <a href="alta_donacion.php">CANCELAR</a>
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

