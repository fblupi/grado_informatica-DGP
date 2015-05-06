<?php
include 'conexionBD.php';

//Extraemos los datos tanto del formulario como del action del propio form
$id = isset($_GET['id']) ? $_GET['id'] : '';

$result = $datos->Query("update alojamiento set Fecha_validacion='".date("d").date("m").date("Y")."' where ID=".$id);
header('location: index.php?cat=novali');//volvemos al informe


?>