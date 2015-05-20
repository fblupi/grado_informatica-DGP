<?php

include 'conexionBD.php';
if(isset($_POST['add_nombre']) && isset($_POST['add_direccion']) && isset($_POST['add_tipo']) && isset($_POST['add_descripcion']) && isset($_COOKIE['id_usuario'])) {
    //Inicializacion de las rutas a null
    $ruta_img=null;
    $ruta_audio=null;
    $ruta_video=null;

    //Seleccion de imagen
    $target_path = "images/alojamientos/";
    $target_path = $target_path . basename($_FILES['uploadedfile']['name']);
    if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
        $ruta_img = 'images/alojamientos/' . basename($_FILES['uploadedfile']['name']);
    }

    //Seleccion de audio
    $target_path = "audio/";
    $target_path = $target_path . basename($_FILES['uploadedaudio']['name']);
    if(move_uploaded_file($_FILES['uploadedaudio']['tmp_name'],$target_path)){
        $ruta_audio='audio/'.basename($_FILES['uploadedaudio']['name']);
    }

    //Seleccion de video
    $target_path = "video/";
    $target_path = $target_path . basename($_FILES['uploadedvideo']['name']);
    if(move_uploaded_file($_FILES['uploadedvideo']['tmp_name'],$target_path)){
        $ruta_video='video/'.basename($_FILES['uploadedvideo']['name']);
    }


        $cadena = "INSERT INTO alojamiento (Nombre,Direccion,Descripcion,Tipo_alojamiento,ID_Dueno,src_img,src_audio,src_video) VALUES ('" . $_POST['add_nombre'] . "','" . $_POST['add_direccion'] . "','" . $_POST['add_descripcion'] . "','" . $_POST['add_tipo'] . "','" . $_COOKIE['id_usuario'] . "','$ruta_img','$ruta_audio','$ruta_video')";
        $result = $datos->Query($cadena);

        if ($result) {
            //Obtengo el ID del nuevo alojamiento insertado
            $id_alojamiento = $datos->LastQueryID();

            //Hago una consulta de todas las caracteristicas
            $result = $datos->Query("SELECT * FROM caracteristicas WHERE tipo='0'");

            $caracteristicas = array();
            while ($fila = mysql_fetch_array($result)) {
                //echo '  Post:   '.$_POST[$fila['Descripcion']];
                if (isset($_POST[$fila['ID_Caracteristicas']])) {
                    //echo '  Post:   '.$_POST[$fila['Descripcion']];
                    $nombreCarac = $fila['ID_Caracteristicas'];
                    $valorCarac = $_POST[$nombreCarac];
                    if ($fila['Tipo_check'] == 1) {
                        $insert = $datos->Query("INSERT INTO caracteristicasalojamiento (ID_Caracteristicas, ID_Alojamiento, Cantidad) VALUES ('$nombreCarac','$id_alojamiento','1')");
                    } else {
                        $insert = $datos->Query("INSERT INTO caracteristicasalojamiento (ID_Caracteristicas, ID_Alojamiento, Cantidad) VALUES ('$nombreCarac','$id_alojamiento','$valorCarac')");
                    }
                    if ($insert) {
                        echo 'Insertado: ' . $nombreCarac . ' ' . $valorCarac . ' <br>';
                    }
                }
            }
            header('location: index.php?cat=gestion_alojamientos&creacion=exito');
        }


}