<?php
include 'conexionBD.php';

//Comprobamos que se ha introducido usuario, correo y contraseña
if (isset($_POST['reg_usuario']) &&isset($_POST['reg_nombre']) && isset($_POST['reg_correo']) && isset($_POST['reg_pass']) && isset($_POST['reg_nif'])) {

    //Extraemos todos los datos
    $nombre = $_POST['reg_nombre'];
    $correo = $_POST['reg_correo'];
    $pass = $_POST['reg_pass'];
    $nif = $_POST['reg_nif'];
    $usuario = $_POST['reg_usuario'];
    //Realizamos la consulta
    $result = $datos->Query("insert into Usuarios (Nombre_usuario,Nombre,NIF,Direccion_correo,contrasena, Tipo_usuario) values ('$usuario','$nombre','$nif','$correo','$pass',5)");
    //Comprobamos que se ha realizado el insert correctamente
    if ($result) {
        header('location: index.php?error_registro=false');
    } else {//Si no, activamos la variable de error de registro para y volvemos a registrarme.php
        header('location: registrarme.php?error_registro=true');
    }
} else {
    header('location: registrarme.php?error_registro=true');
}
                

