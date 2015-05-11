<?php if((isset($_GET['ID_Habitacion']))) {
    include 'conexionBD.php';
    $id_habitacion = $_GET['ID_Habitacion'];
    $result = $datos->Query("SELECT * FROM alojamiento WHERE ID='" . $id_habitacion . "'");
    $row = mysql_fetch_array($result);
    if (isset($row)) {

        ?>

<div class="container" id="main">
    <div class="row">

            <div class="panel panel-warning">
                <div class="panel-heading"><h4>Modificar alojamiento</h4></div>
                <div class="panel-body">
                <form class="form col-md-12" action="script_modificar_habitacion.php?ID_Habitacion=<?php echo $id_habitacion;?>" method="post">

                    <div style="clear:left"></div>
                    <div class="panel-heading"><h4>Servicios</h4></div>
                        <div class="panel-body">
                    <?php

        $result2 = $datos->Query("SELECT * FROM caracteristicas WHERE Tipo='1' order  by Tipo_check");
        $result3 = $datos->Query("SELECT ID_Caracteristica,Cantidad from caracteristicashabitacion where ID_Habitacion='". $id_habitacion."'");

        while ($fila = mysql_fetch_array($result2)) {
            $valor = null;
            $contador = 0;
            while (($fila2 = mysql_fetch_array($result3)) && ($valor == null)) {
                $contador++;
                if ($fila['ID_Caracteristicas'] == $fila2['ID_Caracteristica']) {
                    if ($fila['Tipo_check'] == '1') {
                        $valor = "checked";
                    } else {
                        $valor = $fila2["Cantidad"];
                    }
                }
            }
            if ($contador > 0) {
                mysql_data_seek($result3, 0);
            }
            if ($fila['Tipo_check'] == '1') {
                echo '<div class="col-md-2 col-sm-2">';
                echo '<label for="' . $fila['Descripcion'] . '">' . $fila['Descripcion'] . '</label>';
                $cadena = '<input type="checkbox"  name="' . $fila['ID_Caracteristicas'] . '" value="' . $fila['ID_Caracteristicas'] . '" ' . $valor . '>';
                echo '<input type="checkbox"  name="' . $fila['ID_Caracteristicas'] . '" value="' . $fila['ID_Caracteristicas'] . '" ' . $valor . '>';
            } else {
                echo '<div class="form-group col-md-2 col-sm-2">';
                echo '<label for="' . $fila['Descripcion'] . '">' . $fila['Descripcion'] . '</label>';
                echo '<input type="text" id="' . $fila['ID_Caracteristicas'] . '" name="' . $fila['ID_Caracteristicas'] . '" class="form-control" value="' . $valor . '" >';
            }
            echo '</div>';
        }
        ?>

                    <div class="form-group col-md-9 col-sm-9" style="clear:left">
                        <button type="submit" class="btn btn-success" >Modificar habitacion</button>
                    </div>
                </div>
                </form>  	
                </div>
            </div><!-- div panel warning-->
        </div>
        <div class="clearfix"></div>
    </div>
</div><!--/main-->
<?php
    } else {
        echo "Error al obtener los datos";
    }
}?>