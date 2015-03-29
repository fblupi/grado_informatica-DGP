<?php
include "BD.php";
if(isset($_POST['reg_usuario']) && isset($_POST['reg_correo']) && isset($_POST['reg_pass']))
{
    $datos = new BD("localhost", "GRXDev", "1234","GRXDev");
    $usuario = $_POST['reg_usuario'];
    $correo = $_POST['reg_correo'];
    $pass = $_POST['reg_pass'];
    $result = $datos->Query("insert into Usuarios (Nombre_usuario,Direccion_correo,contrasena) values ('$usuario','$correo','$pass')");
    if($result)
    {
        $GLOBALS['error_registro']=false;
        header('location: index.php');
    }
    else
    {
        $GLOBALS['error_registro'] = true;
        header('location: registrarme.php');
    }
}
else
{
    $GLOBALS['error_registro'] = true;
    header('location: registrarme.php');
}
                
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

