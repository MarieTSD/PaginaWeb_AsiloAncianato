<?php
session_start();

$usuario = "admin"; 
$contra = "1234";
?>

<?php
//conexion a la base de datos
$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'ancianato';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
error_reporting(0);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

if( strcmp($username,$usuario) === 0){

    if(strcmp($password,$contra) === 0 ){
        
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
        header("location: inicio_admin.php");
    }else{
      header("location: login.php");
    } 
}else { 

  header("location: login.php"); 
    //echo "Username o Password estan incorrectos.";
 
    //echo "<br><a href='login.php'>Volver a Intentarlo</a>";
  } 
  mysqli_close($conexion); 
 
 
//$sql = "SELECT * FROM $tbl_name WHERE nombre_usuario = '$username'";

//$result = $conexion->query($sql);


/*if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 if (password_verify($password, $row['password'])) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo "Bienvenido! " . $_SESSION['username'];
    echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }

 mysqli_close($conexion); */


 ?>