<!DOCTYPE html>

<html lang="es">

<head>
        <title>Login</title>
        <meta charset = "utf-8">
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
        <link href="css/log.css" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">ANCIANATO</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Servicio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Actividades</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">Contactanos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<br>
<br>
<br>

<div class="login-reg-panel">
							
		<div class="white-panel">
            <br>
            <br>
            <br>
            <br>
            <form action="checklogin.php" method="post" >
                <label>Nombre Usuario:</label><br>
                <input name="username" type="text" id="username" required>
                <br><br>
                <label>Password:</label><br>
                <input name="password" type="password" id="password" required>
                <br><br>
                <input type="submit" name="Submit" value="LOGIN">
            </form>
		</div>
</div>

<!--

    <div class="container h-100">
                <h1>Login de Usuarios</h1>
                <hr/>

                <form action="checklogin.php" method="post" >

                <label>Nombre Usuario:</label><br>
                <input name="username" type="text" id="username" required>
                <br><br>

                <label>Password:</label><br>
                <input name="password" type="password" id="password" required>
                <br><br>

                <input type="submit" name="Submit" value="LOGIN">

                </form>
    </div>-->
 </body>
</html>