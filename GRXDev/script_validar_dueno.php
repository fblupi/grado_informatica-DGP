<?php
include 'conexionBD.php';

//Comprobamos que se ha introducido usuario, correo y contraseña
if (isset($_GET['ID_Usuario']) && isset($_COOKIE['id_usuario'])) 
{

    //Extraemos todos los datos
    $id = $_GET['ID_Usuario'];
    $id_usuario_sesion = $_COOKIE['id_usuario'];
    $result = $datos->Query("update Usuarios set Validador='$id_usuario_sesion' where ID_Usuario='$id'");
    //Comprobamos que se ha realizado el insert correctamente
    if ($result) {
        header('location: index.php?cat=buscadord');
    }
    else
    {
        header('location: index.php?cat=buscadord');
    }
}
else
{
    header('location: index.php?cat=buscadord');
}
    
