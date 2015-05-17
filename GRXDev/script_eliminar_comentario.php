<?php
include 'conexionBD.php';
$id_alo = isset($_GET['alo']) ? $_GET['alo'] : '';
if (isset($_GET['ID_Comentario'])) 
{

    //Extraemos todos los datos
    $id = $_GET['ID_Comentario'];
	echo $id." ".$id_alo;
    $result = $datos->Query("delete from comentarioalojamiento where ID_Comentario='$id'");
    
}
header('location: index.php?cat=alojamiento&ID_Alojamiento='.$id_alo);
    
