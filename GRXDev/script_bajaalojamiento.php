<?php

include 'conexionBD.php';
//Comprobamos que se ha introducido usuario, correo y contraseña
if (isset($_GET['ID_Alojamiento'])) 
{

    //Extraemos todos los datos
    $id = $_GET['ID_Alojamiento'];
    $select = $datos->Query("select count(*) from Habitacion where ID_Alojamiento = '$id'");
    $row = mysql_fetch_array($select);
    if($row[0] == 0)
    {
        $result = $datos->Query("delete from Alojamiento where ID='$id'");
        //Comprobamos que se ha realizado el insert correctamente
        if ($result) {
            header('location: index.php?cat=gestion_alojamientos');
        }
        else
        {
            echo "Error al eliminar el alojamiento. Contacte con el administrador";
        }
    }
    else
    {
        echo "Existen habitaciones para este alojamiento. Por favor, eliminelas antes de eliminar el alojamiento";
    }
}
else
{
    echo "El alojamiento no se ha indicado o no es correcto.";
}
header( 'refresh:5;url=index.php?cat=gestion_alojamientos' );
