<?php

$categoria=isset($_GET['cat']) ? $_GET['cat'] : '';

if(empty($categoria)){
	include_once 'inicio.php';
}
if(!empty($categoria)){
	if($categoria == 'buscador' ){
		include_once 'buscador.php';
	}
}



?>