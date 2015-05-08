<?php

include 'conexionBD.php';
if(isset($_POST['add_nombre']) && isset($_POST['add_direccion']) && isset($_POST['add_tipo']) && isset($_POST['add_descripcion']) && isset($_COOKIE['id_usuario']))
{
    $cadena = "INSERT INTO alojamiento (Nombre,Direccion,Descripcion,Tipo_alojamiento,ID_Dueno) VALUES ('".$_POST['add_nombre']."','".$_POST['add_direccion']."','".$_POST['add_descripcion']."','".$_POST['add_tipo']."','".$_COOKIE['id_usuario']."')";
    $result=$datos->Query($cadena);
}
if($result)
{
    //Obtengo el ID del nuevo alojamiento insertado
    $id_alojamiento=$datos->LastQueryID();
    
    //Hago una consulta de todas las caracteristicas
    $result=$datos->Query("SELECT * FROM caracteristicas WHERE tipo='0'");

    $caracteristicas=array();
    while($fila=mysql_fetch_array($result)){
        //echo '  Post:   '.$_POST[$fila['Descripcion']];
        if(isset($_POST[$fila['ID_Caracteristicas']])){
            //echo '  Post:   '.$_POST[$fila['Descripcion']];
            $nombreCarac=$fila['ID_Caracteristicas'];
            $valorCarac=$_POST[$nombreCarac];
            if($fila['Tipo_check']==1)
            {
                $insert=$datos->Query("INSERT INTO caracteristicasalojamiento (ID_Caracteristicas, ID_Alojamiento, Cantidad) VALUES ('$nombreCarac','$id_alojamiento','1')");
            }
            else
            {
            $insert=$datos->Query("INSERT INTO caracteristicasalojamiento (ID_Caracteristicas, ID_Alojamiento, Cantidad) VALUES ('$nombreCarac','$id_alojamiento','$valorCarac')");
            }
            if($insert)
            {
                echo 'Insertado: '.$nombreCarac.' '.$valorCarac.' <br>';
            }
        }
    }
}