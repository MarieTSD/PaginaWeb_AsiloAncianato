<?php
    session_start();
    error_reporting(0);

    $serv = 'localhost';
    $cuenta = 'root';
    $contra = '';
    $BaseD = 'ancianato';

    //Variables de session
    $_SESSION['id'] = '';
    $_SESSION['aporte'] = '';
    $_SESSION['fec'] = '';
    $_SESSION['hora'] = '';
    $_SESSION['resi'] = '';
    $_SESSION['bene'] = '';
    $_SESSION['sumi'] = '';
    $_SESSION['medi'] = '';
    $_SESSION['cant'] = '';
    $_SESSION['cantmed'];

    //Realiar la conexion con la base de datos 
    $conexion = new mysqli($serv, $cuenta, $contra, $BaseD);
    if ($conexion->connect_error) {
        die('Ocurrio un error en la conexion con la BD');
    } else {

        //tabla de DONACION
        //$modificar = $_SESSION['mod'];  
        $idD = $_SESSION['mod'];
        $idS = $_SESSION['modS'];
        $idM = $_SESSION['modM'];

        if ($idS != null && $idM != null) {
            // echo "entro a ambas";  
            $sql2 = "SELECT * from donaciones where ID='$idD' and idsum = '$idS' and idmedic = '$idM'";
        } else if ($idS != null && $idM == null) {
            // echo "Aqui inserta el suministro"; 
            $sql2 = "SELECT * from donaciones where ID='$idD' and idsum = '$idS' and idmedic is null";
        } else if ($ids == null && $idM != null) {
            // echo "Aqui inserta el medicamento"; 
            $sql2 = "SELECT * from donaciones where ID='$idD' and idsum is null and idmedic = '$idM'";
        } else if ($ids == null && $idM == NULL) {
            // echo "ambas son nulas"; 
            $sql2 = "SELECT * from donaciones where ID='$idD' and idsum is null and idmedic is null";
        }
        $resultado = $conexion->query($sql2);
        while ($fila = $resultado->fetch_assoc()) {
            $_SESSION['id'] = $fila['ID'];
            $_SESSION['aporte'] = $fila['aporte'];
            $_SESSION['fec'] = $fila['Fecha'];
            $_SESSION['hora'] = $fila['Hora'];
            $_SESSION['resi'] = $fila['NombreCompleto'];
            $_SESSION['idresi'] = $fila['ID_Residente'];
            $_SESSION['bene'] = $fila['nombre'];
            $_SESSION['idben'] = $fila['ID_Benefactor'];
            $_SESSION['sumi'] = $fila['suministro'];
            $_SESSION['idsumi'] = $fila['idsum'];
            $_SESSION['medi'] = $fila['medicamento'];
            $_SESSION['idmedi'] = $fila['idmedic'];
            $_SESSION['cant'] = $fila['Cantidad'];
            $_SESSION['cantmed'] = $fila['Cant'];
        }


        if (isset($_POST['submit'])) {
            $uno = $_POST["id"];
            $dos = $_POST["aport"];
            $tres = $_POST["fecha"];
            $cuatro = $_POST["hr"];
            $cinco = $_POST["residente"];
            $seis = $_POST['benefactor'];
            $siete = $_POST['suministro'];
            $ocho = $_POST['medicamento'];
            $nueve = $_POST['idC'];
            $diez = $_POST['idMedic'];

            //VARIABLES DE SESION

            $idD = $_SESSION['mod'];
            $idS = $_SESSION['modS'];
            $idM = $_SESSION['modM'];
            $Resi = $_SESSION['idresi'];
            $Bene = $_SESSION['idben'];
            $sumi = $_SESSION['idsumi'];
            $medi = $_SESSION['idmedi'];
            //echo $NomResi; 
            //echo $cinco; 
            if ($Resi != null) {
                //echo "es diferente"; 
                //if($Resi != $cinco){
                $ne = "UPDATE donacion set ID='$uno', Aporte='$dos', Fecha='$tres', 
                Hora='$cuatro', ID_Residente='$cinco', ID_Benefactor = NULL WHERE ID='$idD'";
                // }else
            } else if ($Bene != null) {
                //echo "son iguales "; 
                //if($$Bene != $seis){
                $ne = "UPDATE donacion set ID='$uno', aporte='$dos', Fecha='$tres', 
                Hora='$cuatro', ID_Residente = NULL, ID_Benefactor='$seis' WHERE ID='$idD";
                //}
            }


            if ($sumi != null && $medi != null) {

                $ne2 = "UPDATE aparecen_sd set Codigo_Suministro = '$siete', ID_Donacion = '$uno', Cantidad = '$nueve'
           where ID_Donacion = '$idD' and Codigo_Suministro = $idS";

                $ne3 = "UPDATE aparecen_md set ID_Medicamento = '$ocho', ID_Donacion = '$uno', Cantidad = '$diez' 
           where ID_Donacion = '$idD' and ID_Medicamento = $idM";
            } else if ($sumi != null && $medi == null) {

                $ne2 = "UPDATE aparecen_sd set Codigo_Suministro = '$siete', ID_Donacion='$uno', Cantidad = '$nueve' 
            where ID_Donacion = '$idD' and Codigo_Suministro = '$idS'";
            } else if ($sumi == null && $medi != null) {
                $ne3 = "UPDATE aparecen_md set ID_Medicamento = '$ocho', ID_Donacion = '$uno', Cantidad = '$diez' 
            where ID_Donacion = '$idD' and ID_Medicamento = $idM";
            }
          
            $fin = $conexion->query($ne);
            $fin2 = $conexion->query($ne2);
            $fin3 = $conexion->query($ne3);
            if ($conexion->affected_rows >= 1) {
                $_SESSION['exito2'] = "si";
                header("Location: actualizar_donacion.php");
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
            <a class="btn btn-outline-light" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LOGOUT</a>
        </div>
    </nav>

      <section class="bg-primary text-white h-25">
          <div class="container text-center pt-5">
              <h2 class="mb-2 pt-5">ACTUALIZAR CAMPOS DONACION</h2>
          </div>
      </section>

      <section class="hero3">
          <form class="contact100-form validate-form" action="AgregarSM.php" enctype="multipart/form-data" method="post" id="alta">

              <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                  <span class="label-input100">ID DONACION:</span>
                  <input class="input100" type="number" name="id" value="<?php echo $_SESSION['id']; ?>" required>
                  <span class="focus-input100"></span>
              </div>

              <div class="container-contact100-form-btn p-1">
                  <span class="label-input100">Suministro:</span>
                  <select name="suministro" id="suministro" class="input100">
                      <option value="<?php echo $_SESSION['idsumi']; ?>"><?php echo $_SESSION['sumi']; ?></option>
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
                      <option value="<?php echo $_SESSION['idmedi']; ?>"><?php echo $_SESSION['medi']; ?></option>
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
                  <input class="input100" type="number" name="idC" value="<?php echo $_SESSION['cant']; ?>">
                  <span class="focus-input100"></span>
              </div>

              <div class="wrap-input100 validate-input p-1" data-validate="Requerido">
                  <span class="label-input100">Cantidad Medicamento:</span>
                  <input class="input100" type="number" name="idMedic" value="<?php echo $_SESSION['cantmed']; ?>">
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