<?php if((isset($_GET['ID_Alojamiento'])))
{
    include 'conexionBD.php';
    $id_alojamiento = $_GET['ID_Alojamiento'];
    $result = $datos->Query("SELECT * FROM alojamiento WHERE ID = '" .$_GET['ID_Alojamiento']. "'");
    $row = mysql_fetch_array($result);
    if(isset($row))
    {
        
?>

<div class="container" id="main">
    <div class="row">
        <div center-block">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4>Modificar alojamiento</h4></div>
                <div class="panel-body">
                <form class="form col-md-12" action="script_modificar_alojamiento.php?ID_Alojamiento=<?php echo $id_alojamiento;?>" method="post">
                    <div class="form-group col-md-3 col-sm-3">    
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="add_nombre" class="form-control" value="<?php echo $row['Nombre'];?>">
                    </div>
                    <div class="form-group col-md-5 col-sm-5">    
                        <label for="nombre">Dirección</label>
                        <input type="text" id="nombre" name="add_direccion" class="form-control" value="<?php echo $row['Direccion'];?>" >
                    </div>
                    <div class="form-group col-md-2 col-sm-2">  
                        <label for="tipo">Tipo</label>
                        <select name="add_tipo" id="estrella" class="form-control">
                            <option value="1" <?php if($row['Tipo_alojamiento']=='1'){ echo "selected";}?>>Hotel</option>
                            <option value="2" <?php if($row['Tipo_alojamiento']=='2'){ echo "selected";}?>>Casa rural</option>
                            <option value="3" <?php if($row['Tipo_alojamiento']=='3'){ echo "selected";}?>>Piso</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-2">    
                        <label for="nombre">Precio</label>
                        <input type="text" id="nombre" name="add_precio" class="form-control">
                    </div>
                    <div class="form-group col-md-9 col-sm-9">    
                        <label for="nombre">Descripción</label>
                        <textarea type="text" id="nombre" rows="5" name="add_descripcion" class="form-control" value="<?php echo $row['Descripcion'];?>"></textarea>
                    </div>
                    <div style="clear:left"></div>
                    <div class="panel-heading"><h4>Servicios</h4></div>
                        <div class="panel-body">
                    <?php
                    
                    $result2=$datos->Query("SELECT * FROM caracteristicas WHERE tipo='0' order  by Tipo_check");
                    $result3=$datos->Query("SELECT ID_Caracteristicas, Cantidad from caracteristicasalojamiento where ID_Alojamiento=".$id_alojamiento);
                    
                    while($fila=mysql_fetch_array($result2))
                    {
                        $valor = null;
                        $contador = 0;
                        while(($fila2=mysql_fetch_array($result3)) && ($valor == null))
                        {
                            $contador++;
                            if($fila['ID_Caracteristicas'] == $fila2['ID_Caracteristicas'])
                            {
                                if($fila['Tipo_check']=='1')
                                {
                                    $valor = "checked";
                                }
                                else
                                {
                                    $valor = $fila2["Cantidad"];
                                }
                            }
                        }
                        if($contador>0)
                        {
                            mysql_data_seek($result3, 0);
                        }
                        if($fila['Tipo_check']=='1')
                        {
                            echo '<div class="col-md-2 col-sm-2">';
                            echo '<label for="'.$fila['Descripcion'].'">'.$fila['Descripcion'].'</label>';
                            $cadena = '<input type="checkbox"  name="'.$fila['ID_Caracteristicas'].'" value="'.$fila['ID_Caracteristicas'].'" '.$valor.'>';
                            echo '<input type="checkbox"  name="'.$fila['ID_Caracteristicas'].'" value="'.$fila['ID_Caracteristicas'].'" '.$valor.'>';
                        }
                        else
                        {
                            echo '<div class="form-group col-md-2 col-sm-2">';
                            echo '<label for="'.$fila['Descripcion'].'">'.$fila['Descripcion'].'</label>';
                            echo '<input type="text" id="'.$fila['ID_Caracteristicas'].'" name="'.$fila['ID_Caracteristicas'].'" class="form-control" value="'.$valor.'" >';
                        }
                        echo '</div>';
                    }
                    ?>

                    <div class="form-group col-md-9 col-sm-9" style="clear:left">
                        <button type="submit" class="btn btn-success" >Modificar alojamiento</button>
                    </div>
                        </div>
                    </div>
                </form>  	
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div><!--/main-->
<?php
    }
    else
    {
        echo "Error al obtener los datos";
    }
}
?>
