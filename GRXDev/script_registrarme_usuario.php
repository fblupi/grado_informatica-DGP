<?php

include 'conexionBD.php';

//Comprobamos que se ha introducido usuario, correo y contraseña
if (isset($_POST['reg_usuario']) && isset($_POST['reg_correo']) && isset($_POST['reg_pass'])) {

    //Extraemos todos los datos
    $usuario = $_POST['reg_usuario'];
    $correo = $_POST['reg_correo'];
    $pass = $_POST['reg_pass'];
    $nombre = $_POST['reg_nombre'];
    $apellidos = $_POST['reg_apellidos'];
    $fechanac = $_POST['reg_fechanac'];
    $ubicacion = $_POST['reg_ubicacion'];
    $sexo = $_POST['reg_sexo'];
    //Realizamos la consulta
    $result = $datos->Query("insert into Usuarios (Nombre_usuario,Direccion_correo,contrasena,nombre,apellidos,sexo,fecha_nacimiento,ubicacion) values ('$usuario','$correo','$pass','$nombre','$apellidos','$sexo','$fechanac','$ubicacion')");
    //Comprobamos que se ha realizado el insert correctamente
    if ($result) {
        header('location: index.php');
    } else {//Si no, activamos la variable de error de registro para y volvemos a registrarme.php
        header('location: registrarme.php?error_registro=true');
    }
} else {
    header('location: registrarme.php?error_registro=true');
}
                

