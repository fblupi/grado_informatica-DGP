<?php

$categoria=isset($_GET['cat']) ? $_GET['cat'] : '';

if(empty($categoria)){
	include_once 'inicio.php';
}
if(!empty($categoria)){
	if($categoria == 'buscador' ){
		include_once 'buscador.php';
	}
        else if($categoria == 'registrarme')
        {
            include_once 'registrarme.php';
        }
			else if($categoria == 'perfil'){
				include_once 'perfil.php';
			}
				else if($categoria == 'modificar'){
					include_once 'modificar.php';
				}
					elseif($categoria=='buscadord'){
						include_once 'buscador_duenos.php';
					}
					elseif($categoria=='buscador_alo'){
						include_once 'buscadorAlojamiento.php';
					}
					elseif($categoria=='buscador_habi'){
						include_once 'buscadorHabitacion.php';
					}
}
?>