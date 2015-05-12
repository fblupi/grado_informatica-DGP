<div class="container" id="main">
    <div class="row">
<?php if($_COOKIE['sesion_iniciada']){ $usuario=$_COOKIE['id_usuario']?>
<div class="col-md-12 col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading"><h4>Mis reservas de alojamientos</h4></div>
        <div class="panel-body">
            <?php include 'conexionBD.php'; $result=$datos->Query("SELECT * FROM reserva_alojamiento WHERE ID_usuario='$usuario'");?>
            <?php if($result){?>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID Alojamiento</th>
                                <th>Fecha entrada</th>
                                <th>Fecha salida</th>
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
                                    <td><?php echo $row['ID_Alojamiento']; ?></td>
                                    <td><?php echo $row['Fecha_entrada']; ?></td>
                                    <td><?php echo $row['Fecha_Salida']; ?></td>
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
            <?php } ?>
        </div>
        <!-- Mis reservas habitaciones -->
        <div class="panel-heading"><h4>Mis reservas de habitaciones</h4></div>
        <div class="panel-body">
            <?php $result=$datos->Query("SELECT * FROM reserva_habitacion WHERE ID_usuario='$usuario'");?>
            <?php if($result){?>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID Habitacion</th>
                                <th>Fecha entrada</th>
                                <th>Fecha salida</th>
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
                                    <td><?php echo $row['ID_Habitacion']; ?></td>
                                    <td><?php echo $row['Fecha_entrada']; ?></td>
                                    <td><?php echo $row['Fecha_salida']; ?></td>
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
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>
</div>
</div><!--/main-->