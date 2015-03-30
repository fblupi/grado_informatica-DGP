<?php
    /*Comprobamos si se ha obtenido correo y pass por medio de un formulario
     *en el cas de que se reciba algun dato en ambos se realizará la consulta.
     * En el caso de que existe el usuario que ha iniciado sesión, asignamos
     * las variables globales de nombre_perfil y sesion_iniciada.
     */
    if (isset($_POST['correo']) && isset($_POST['pass'])) {
        include "BD.php";
        $datos = new BD("localhost", "root", "", "GRXDev");
        $nombreusuario = htmlspecialchars($_POST['correo']);
        $contrasena = htmlspecialchars($_POST['pass']);
        $result = $datos->Query("select Nombre_usuario,Tipo_usuario, ID_Usuario from Usuarios where Direccion_correo='$nombreusuario' AND Contrasena='$contrasena'");
        if (mysql_num_rows($result) > 0) {
            $fila = mysql_fetch_row($result);
            setcookie('id_usuario',$fila[2]);
            setcookie('nombre_perfil',$fila[0]);
            setcookie('tipo_usuario',$fila[1]);
            setcookie('sesion_iniciada',true);
            header('location: index.php');
        }
        else
        {
            header('location: index.php?error_sesion=true');
        }
    }
    else
    {
        header('location: index.php?error_sesion=true');
    }

