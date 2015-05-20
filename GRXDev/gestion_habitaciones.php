<div class="container" id="main">
    <div class="row">
        <?php if ((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result) == 0) { ?>
    <div class="col-md-12 col-sm-12">
        <div class="alert alert-info alert-dismissable">Error al iniciar sesi�n.</div>
    </div>
<?php } ?>
<?php if(isset($_GET['creacion'])){
    $creacion=$_GET['creacion'];
    switch($creacion){
        case 'exito':
            echo '<div class="col-md-12 col-sm-12">
                    <div class="alert alert-success">La habitación ha sido creada con éxito.</div>
                  </div> ';
            break;
    }
}?>
<div center-block">
<div class="panel panel-warning">
    <div class="panel-heading"><h4>Añadir habitaciones</h4></div>
    <?php $alojamiento=$_GET['ID_Alojamiento']?>
    <div class="panel-body">
        <form class="form col-md-12" action="script_nueva_habitacion.php?ID_Alojamiento=<?php echo $alojamiento;?>" method="post">
            <div class="form-group col-md-3 col-sm-1">
                <label for="precio">Habitaciones a añadir: </label>
                <input type="number" id="copias" name="copias" class="form-control">
            </div>
            <div style="clear: left">
            <?php
                include 'conexionBD.php';
                $result=$datos->Query("SELECT * FROM caracteristicas WHERE tipo='1' ORDER BY Tipo_check");
                while($fila=mysql_fetch_array($result)){

                    if($fila['Tipo_check']=='1'){
                        echo '<div class="col-md-2 col-sm-2">';
                        echo '<label for="'.$fila['Descripcion'].'">'.utf8_encode($fila['Descripcion']).' </label>';
                        echo '<input type="checkbox"  name="'.$fila['ID_Caracteristicas'].'" value="'.$fila['ID_Caracteristicas'].'" >';
                    }else{
                        echo '<div class="form-group col-md-2 col-sm-2>';
                        echo '<label for="'.$fila['Descripcion'].'">'.utf8_encode($fila['Descripcion']).' </label>';
                        echo '<input type="text" id="'.$fila['ID_Caracteristicas'].'" name="'.$fila['ID_Caracteristicas'].'" class="form-control" >';
                    }
					echo '</div>';
                }
            ?>
            </div>
            <div class="form-group col-md-9 col-sm-9" style="clear:left">
                <button type="submit" class="btn btn-success" >Nueva habitación</button>
            </div>
        </form>
    </div>
</div>
</div> <!-- Buscador -->
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-warning">
            <div class="panel-heading"><h4>Habitaciones de este alojamiento</h4></div>
            <div class="panel-body">
                <?php $result=$datos->Query("SELECT * FROM habitacion WHERE ID_Alojamiento='".$alojamiento."'")?>
                <?php if($result){?>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Habilitado</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody id="myTable">
                            <?php
                            while ($row = mysql_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['ID'] ?></td>
                                    <td><?php if($row['Habilitado']=='0'){ $habilitado=false; echo 'NO'; }else { $habilitado=true; echo 'SI';} ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php if($habilitado){?>
                                            <button class="btn btn-danger" onClick="location.href = 'script_baja_alta_habitacion.php?ID_Habitacion=<?php echo $row['ID'] ?>'" >Dar de baja</button>
                                        <?php }else{?>
                                            <button class="btn btn-info" onClick="location.href = 'script_baja_alta_habitacion.php?ID_Habitacion=<?php echo $row['ID'] ?>'" >Dar de alta</button>
                                        <?php }?>
                                    </td>
                                    <td><button class="btn btn-warning" onClick="location.href = 'index.php?cat=modificar_habitacion&ID_Habitacion=<?php echo $row['ID'] ?>'" >Modificar</button></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 text-center">
                        <ul class="pagination pagination-lg pager" id="myPager"></ul>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div id="resultado_busqueda">
    </div>
    <div class="clearfix"></div>
</div>
</div><!--/main-->