<?php
include "BD.php";
//Comprobamos que se ha introducido usuario, correo y contraseña
if (isset($_POST['reg_nombre']) && isset($_POST['reg_correo']) && isset($_POST['reg_pass']) && isset($_POST['reg_nif'])) {
    $datos = new BD("localhost", "GRXDev", "1234", "GRXDev");
    //Extraemos todos los datos
    $nombre = $_POST['reg_nombre'];
    $correo = $_POST['reg_correo'];
    $pass = $_POST['reg_pass'];
    $nif = $_POST['reg_nif'];

    //Realizamos la consulta
    $result = $datos->Query("insert into Duenos (Nombre,NIF,Direccion_correo,contrasena) values ('$nombre','$nif','$correo','$pass')");
    //Comprobamos que se ha realizado el insert correctamente
    if ($result) {
        $GLOBALS['error_registro'] = false;
        header('location: index.php');
    } else {//Si no, activamos la variable de error de registro para y volvemos a registrarme.php
        $GLOBALS['error_registro'] = true;
        header('location: registrarme.php');
    }
} else {
    $GLOBALS['error_registro'] = true;
    header('location: registrarme.php');
}
                

