<?php
include 'conexionBD.php';

//Extraemos los datos tanto del formulario como del action del propio form
$id = isset($_GET['id']) ? $_GET['id'] : '';


$result = $datos->Query("update alojamiento set ID_Validador='".$_COOKIE['id_usuario']."' where ID=".$id);
header('location: index.php?cat=novali');//volvemos al informe


?>