<?php
include 'conexionBD.php';

//Obtengo el alojamiento
$alojamiento=$_GET['ID_Alojamiento'];

//Numero de habitaciones iguales a insertar
$copias=isset($_POST['copias'])?$_POST['copias']:1;

//Itero tantas veces como lo indicado
for($i=0;$i<$copias;$i=$i+1){
    //Inserto la nueva habitacion
    $result=$datos->Query("INSERT INTO habitacion (ID_Alojamiento,Habilitado) VALUES ('$alojamiento','6')");
    if($result)
        echo 'Insertada habitacion';

    //Obtengo el ID del nuevo alojamiento insertado
    $id_habitacion=$datos->LastQueryID();

    //Hago una consulta de todas las caracteristicas
    $result=$datos->Query("SELECT * FROM caracteristicas WHERE tipo='1'");

    $caracteristicas=array();
    while($fila=mysql_fetch_array($result)){
        //echo '  Post:   '.$_POST[$fila['Descripcion']];
        if(isset($_POST[$fila['ID_Caracteristicas']])){
            //echo '  Post:   '.$_POST[$fila['Descripcion']];
            $nombreCarac=$fila['ID_Caracteristicas'];
            $valorCarac=$_POST[$nombreCarac];
            if($fila['Tipo_check']==1)
                $insert=$datos->Query("INSERT INTO caracteristicashabitacion (ID_Caracteristica, ID_Habitacion, Cantidad) VALUES ('$nombreCarac','$id_habitacion','1')");
            else
                $insert=$datos->Query("INSERT INTO caracteristicashabitacion (ID_Caracteristica, ID_Habitacion, Cantidad) VALUES ('$nombreCarac','$id_habitacion','$valorCarac')");

            if($insert)
                header('location: index.php?cat=gestion_habitaciones&creacion=exito&ID_Alojamiento='.$alojamiento);
        }
    }
}



