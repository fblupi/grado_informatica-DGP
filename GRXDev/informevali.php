<?php
include 'conexionBD.php';

$result = $datos->Query("SELECT ID,Nombre,Direccion from alojamiento where ID_Validador!=0 and Fecha_validacion!=0");

?>
<div class="container" id="main">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4>Informe: Validados</h4></div>
        <div class="panel-body">
            <?php if(!empty($result)) { ?>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
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
                                            <td><?php echo$row['Nombre'] ?></td>
                                            <td><?php echo$row['Direccion'] ?></td>
                                            
                                            <td><button class="btn btn-primary" onClick="location.href = 'index.php?cat=alojamiento&alojamiento=<?php echo $row['ID'] ?>'" >Ver mas</button></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
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
        <div class="clearfix"></div>
    </div>
</div><!--/main-->






