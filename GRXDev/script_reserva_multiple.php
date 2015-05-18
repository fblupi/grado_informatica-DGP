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
    //$id_habitacion = $_GET['ID_Habitacion'];
    $id_usuario = $_COOKIE['id_usuario'];
    include 'conexionBD.php';

    if(isset($_POST['habitaciones'])) {
        $habitaciones=$_POST['habitaciones'];
        foreach($habitaciones as $id_habitacion){
            if ($desde_sql < $hasta_sql) {
                $cadena = "select count(*) from reserva_habitacion where ID_Habitacion = '$id_habitacion' AND ((Fecha_entrada BETWEEN '$desde_sql' AND '$hasta_sql') OR (Fecha_salida BETWEEN '$desde_sql' AND '$hasta_sql'))";
                $select = $datos->Query($cadena);
                if ($select) {
                    $row = mysql_fetch_array($select);
                    if ($row[0] == 0) {
                        $result = $datos->Query("insert into reserva_habitacion (ID_Habitacion,ID_Usuario,Fecha_entrada,Fecha_salida,NumeroTarjeta,TipoTarjeta) values ('$id_habitacion','$id_usuario','$desde_sql','$hasta_sql','$tarjeta','$tipo_tarjeta')");
                        //Comprobamos que se ha realizado el insert correctamente
                        if ($result) {
                            header('location: index.php');
                        } else {
                            header('location: reservar_habitacion.php?error_reserva=true');
                        }
                    } else {
                        header('location: reservar_habitacion.php?error_fechas_ocupadas=true');
                    }
                } else {
                    header('location: reservar_habitacion.php?error_select=true');
                }
            } else {
                header('location: reservar_habitacion.php?error_fechas=true');
            }
        }

    }
}
