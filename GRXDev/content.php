<?php

$categoria=isset($_GET['cat']) ? $_GET['cat'] : '';

switch($categoria){
    case 'buscador':
        include_once 'buscador.php';
        break;
    case 'registrarme':
        include_once 'registrarme.php';
        break;
    case 'perfil':
        include_once 'perfil.php';
        break;
    case 'modificar':
        include_once 'modificar.php';
        break;
    case 'buscadord':
        include_once 'buscador_duenos.php';
        break;
    case 'buscador_alo':
        include_once 'buscadorAlojamiento.php';
        break;
    case 'buscador_habi':
        include_once 'buscadorHabitacion.php';
        break;
    case 'novali':
        include_once 'informenovali.php';
        break;
    case 'vali':
        include_once 'informevali.php';
        break;
    case 'alojamiento':
        include_once 'alojamiento.php';
        break;
    case 'habitacion':
        include_once 'habitacion.php';
        break;
    case 'gestion_alojamientos':
        include_once 'gestion_alojamientos.php';
        break;
    case 'gestion_habitaciones':
        include_once 'gestion_habitaciones.php';
        break;
    case 'modificar_alojamiento':
        include_once 'modificaralojamiento.php';
        break;
    case 'modificar_habitacion':
        include_once 'modificar_habitacion.php';
        break;
    case 'reserva_habitacion':
        include_once 'reservar_habitacion.php';
        break;
    case 'reserva_alojamiento':
        include_once 'reservar_alojamiento.php';
        break;
    case 'mis_reservas':
        include_once 'mis_reservas.php';
        break;
    case 'reserva_multiple':
        include_once 'reserva_multiple.php';
        break;
    default:
        include_once 'inicio.php';

}
    /*
	if($categoria == 'buscador' ){
		include_once 'buscador.php';
	}
        else if($categoria == 'registrarme')
        {
            include_once 'registrarme.php';
        }
			else if($categoria == 'perfil'){

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
					elseif($categoria=='novali'){
						include_once 'informenovali.php';
					}
					elseif($categoria=='vali'){
						include_once 'informevali.php';
					}
					elseif($categoria=='alojamiento'){
						include_once 'alojamiento.php';
					}
					elseif($categoria=='habitacion'){
						include_once 'habitacion.php';
					}
					elseif($categoria=='gestion_alojamientos'){
                        include_once 'gestion_alojamientos.php';
                    }elseif($categoria=='gestion_habitaciones'){
                        include_once 'gestion_habitaciones.php';
                }
    */

