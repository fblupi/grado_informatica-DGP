<?php
include "BD.php";
//Comprobamos que se ha introducido usuario, correo y contraseña
if (isset($_GET['nombre_usuario'])) 
{
    $datos = new BD("localhost", "root", "", "GRXDev");
    //Extraemos todos los datos
    $nombre = $_GET['nombre_usuario'];
    $result = $datos->Query("delete from Usuarios where Nombre_usuario='$nombre'");
    //Comprobamos que se ha realizado el insert correctamente
    if ($result) {
        header('location: index.php');
    }
    else
    {
        header('location: index.php?cat=buscador');
    }
}
else
{
    header('location: index.php?cat=buscador');
}
    
