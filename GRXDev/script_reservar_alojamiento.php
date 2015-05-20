<?php

if (isset($_POST['reserva_desde']) && isset($_POST['reserva_hasta']) && isset($_POST['reserva_tarjeta']) &&isset($_POST['reserva_tipo_tarjeta'])) {
    $fecha_desde_original = $_POST['reserva_desde'];
    $fecha_hasta_original = $_POST['reserva_hasta'];
    $desde = strtotime($fecha_desde_original);
    $hasta = strtotime($fecha_hasta_original);
    $desde_sql = date('Y-m-d',$desde);
    $hasta_sql = date('Y-m-d',$hasta);
    $tarjeta = $_POST['reserva_tarjeta'];
    $tipo_tarjeta = $_POST['reserva_tipo_tarjeta'];
    $id_alojamiento = $_GET['ID_Alojamiento'];
    $id_usuario = $_COOKIE['id_usuario'];
    include 'conexionBD.php';
    if($desde_sql < $hasta_sql)
    {
        $cadena = "select count(*) from reserva_alojamiento where ID_Alojamiento = '$id_habitacion' AND ((Fecha_entrada BETWEEN '$desde_sql' AND '$hasta_sql') OR (Fecha_Salida BETWEEN '$desde_sql' AND '$hasta_sql'))";
        $select = $datos->Query($cadena);
        if($select)
        {
            $row = mysql_fetch_array($select);
            if($row[0] == 0)
            {
                $cadena2 = "insert into reserva_alojamiento (ID_Alojamiento,ID_Usuario,Fecha_entrada,Fecha_Salida,NumeroTarjeta,TipoTarjeta) values ('$id_alojamiento','$id_usuario','$desde_sql','$hasta_sql','$tarjeta','$tipo_tarjeta')";
                $result = $datos->Query($cadena2);
                //Comprobamos que se ha realizado el insert correctamente
                if ($result) {
                    header('location: index.php?cat=buscador_alo&reserva=alo_exito');
                } else {
                    header('location: reservar_alojamiento.php?error_reserva=true&ID_Alojamiento='.$id_alojamiento);
                }
            }
            else
            {
                header('location: reservar_alojamiento.php?error_fechas_ocupadas=true&ID_Alojamiento='.$id_alojamiento);
            }
        }
        else
        {
            header('location: reservar_alojamiento.php?error_select=true');
        }
    }
    else
    {
        header('location: reservar_alojamiento.php?error_fechas=true&ID_Alojamiento='.$id_alojamiento);
    }
}
