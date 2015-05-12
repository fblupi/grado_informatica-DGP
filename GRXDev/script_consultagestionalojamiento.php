<?php
include 'conexionBD.php';
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$ubicacion = isset($_GET['ubicacion']) ? $_GET['ubicacion'] : '';

//Comprobamos que hay algun campo "relleno"
if($nombre=='' && $tipo=='' && $ubicacion==''){
	$result=null;
}
else{
$result = $datos->Query("SELECT ID, Nombre,Direccion,Descripcion FROM alojamiento WHERE Nombre LIKE '%" . $nombre . "%' and Tipo_alojamiento LIKE '%" . $tipo . "%' and Direccion LIKE '%" . $ubicacion . "%'");

}
?>
<div class="col-md-12 col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Resultados</h4></div>
        <div class="panel-body">
            <?php if (!empty($result)) { ?>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Descripcion</th>
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
                                            <td><?php echo $row['Nombre'] ?></td>
                                            <td><?php echo $row['Direccion'] ?></td>
                                            <td><?php echo $row['Descripcion'] ?></td>

                                            <td></td>
                                            <td><button class="btn btn-primary" onClick="location.href = 'index.php?cat=gestion_habitaciones&ID_Alojamiento=<?php echo $row['ID'] ?>'" >Gestionar habitaciones</button></td>
                                            <td><button class="btn btn-danger" onClick="location.href = 'script_bajaalojamiento.php?ID_Alojamiento=<?php echo $row['ID'] ?>'" >Dar de baja</button></td>
                                            <td><button class="btn btn-warning" onClick="location.href = 'script_modificaralojamiento.php?ID_Alojamiento=<?php echo $row['ID'] ?>'" >Modificar</button></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 text-center">
                            <ul class="pagination pagination-lg pager" id="myPager"></ul>
                        </div>
                    </div>
                <?php
            } else {
                ?>
                <p></p>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</div>

