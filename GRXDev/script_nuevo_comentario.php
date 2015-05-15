<?php

include 'conexionBD.php';
$comentario = isset($_POST['comentario']) ? $_POST['comentario'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$fecha=date("d")."-".date("m")."-".date("Y");
$hora=date("G").":".date("i");
if($comentario!=''){
	$cadena = "INSERT INTO comentarioalojamiento (ID_Alojamiento,ID_Usuario,Comentario,Fecha,Hora) VALUES (".$id.",".$_COOKIE['id_usuario'].",'".$comentario."','".$fecha."','".$hora."')";
	$result=$datos->Query($cadena);
}
header('location: index.php?cat=alojamiento&ID_Alojamiento='.$id);