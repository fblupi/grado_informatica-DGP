<?php
include "BD.php";
//Comprobamos que se ha introducido usuario, correo y contraseña
if (isset($_GET['ID_Usuario'])) 
{
    $datos = new BD("localhost", "root", "", "GRXDev");
    //Extraemos todos los datos
    $id = $_GET['ID_Usuario'];
    $result = $datos->Query("update Usuarios set Tipo_usuario=2 where ID_Usuario='$id'");
    //Comprobamos que se ha realizado el insert correctamente
    if ($result) {
        header('location: index.php?cat=buscador');
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
    