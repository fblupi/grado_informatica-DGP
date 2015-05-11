<?php
    include 'conexionBD.php';

    $habitacion=$_GET['ID_Habitacion'];

    $result=$datos->Query("SELECT Habilitado FROM habitacion WHERE ID='".$habitacion."'");

    if($fila=mysql_fetch_array($result)){
        if($fila['Habilitado']==0){
            $nuevoValorHabilitado=1;
        }else{
            $nuevoValorHabilitado=0;
        }

        $result=$datos->Query("UPDATE habitacion SET Habilitado='".$nuevoValorHabilitado."' WHERE ID='".$habitacion."'");
    }

    header('Location:' . getenv('HTTP_REFERER'));