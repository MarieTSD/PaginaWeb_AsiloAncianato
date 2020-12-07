<?php
session_start();
if(session_destroy()) //destruye todas las sesiones
{
    header("Location: index.php"); //redirigiendo a la pagina index.php 
}
?>