<?php
if((isset($_GET['ID_Habitacion'])))
{
    $id_habitacion = $_GET['ID_Habitacion'];
    if(isset($_COOKIE['id_usuario']))
    {
        include 'conexionBD.php';

        //Hago una consulta de todas las caracteristicas
        $del=$datos->Query("DELETE FROM caracteristicashabitacion WHERE ID_Habitacion=".$id_habitacion);
        if($del)//si se ha borrado las antiguas caracteristicas
        {
            $result=$datos->Query("SELECT * FROM caracteristicas WHERE tipo='1'");

            $caracteristicas=array();
            while($fila=mysql_fetch_array($result)){

                if(isset($_POST[$fila['ID_Caracteristicas']])){

                    $nombreCarac=$fila['ID_Caracteristicas'];
                    $valorCarac=$_POST[$nombreCarac];
                    if($fila['Tipo_check']==1)
                    {
                        $insert=$datos->Query("INSERT INTO caracteristicashabitacion (ID_Caracteristica, ID_Habitacion, Cantidad) VALUES ('$nombreCarac','$id_habitacion','1')");
                    }
                    else
                    {
                        $insert=$datos->Query("INSERT INTO caracteristicashabitacion (ID_Caracteristica, ID_Habitacion, Cantidad) VALUES ('$nombreCarac','$id_habitacion','$valorCarac')");
                    }
                    if(!$insert)
                    {
                        echo 'NO Insertado: '.$nombreCarac.' '.$valorCarac.' <br>';
                    }
                }
            }
            echo "Modificado correctamente";
            header( 'refresh:2;url=index.php?cat=modificar_habitacion&ID_Habitacion='.$id_habitacion );
        }
    }
    else
    {
        echo "Error obteniendo los valores del formulario";
        header( 'refresh:5;url=index.php?cat=gestion_habitaciones' );
    }
}
else
{
    echo "No se puede obtener el ID de alojamiento";
    header( 'refresh:5;url=index.php?cat=gestion_habitaciones' );
}