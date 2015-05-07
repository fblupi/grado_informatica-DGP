<?php
include 'conexionBD.php';

$result=$datos->Query("SELECT * FROM caracteristicas WHERE tipo='1'");

$caracteristicas=array();
while($fila=mysql_fetch_array($result)){
    //echo '  Post:   '.$_POST[$fila['Descripcion']];
    if(isset($_POST[$fila['Descripcion']])){
        //echo '  Post:   '.$_POST[$fila['Descripcion']];
        $carac=$_POST[$fila['Descripcion']];
        array_push($caracteristicas,$carac);
    }
}
$alojamiento=$_GET['ID_Alojamiento'];


$result=$datos->Query("INSERT INTO habitacion (ID,ID_Alojaminto,Habilitado) VALUES ('ID','$alojamiento','6')");

if($result)
    echo 'Insertado';

