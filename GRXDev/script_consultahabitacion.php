<?php
include "BD.php";
$datos = new BD("localhost", "root", "", "GRXDev");

$carac=array();
$tam=0;

$wifi = isset($_GET['wifi']) ? $_GET['wifi'] : '';
if($wifi!=''){
	array_push($carac,$wifi);
	$tam++;
}
$ncamas = isset($_GET['ncamas']) ? $_GET['ncamas'] : '';
if($ncamas!=''){
	array_push($carac,$ncamas);
	$tam++;
}
$bano = isset($_GET['bano']) ? $_GET['bano'] : '';
if($bano!=''){
	array_push($carac,$bano);
	$tam++;
}
$tele = isset($_GET['tele']) ? $_GET['tele'] : '';
if($tele!=''){
	array_push($carac,$tele);
	$tam++;
}
$caja = isset($_GET['caja']) ? $_GET['caja'] : '';
if($caja!=''){
	array_push($carac,$caja);
	$tam++;
}
$armario = isset($_GET['armario']) ? $_GET['armario'] : '';
if($armario!=''){
	array_push($carac,$armario);
	$tam++;
}

if($wifi=='' && $ncamas=='' && $bano=='' && $tele=='' && $caja=='' && $armario==''){
	$result=null;
}
else{
$result = $datos->Query("SELECT ID,Precio FROM habitacion");

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
                                        <th>Precio</th>
                                        <th></th>
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
									if(!empty($carac)){
										while($row = mysql_fetch_array($result)){
											$completo=true;
											$result_car = $datos->Query("SELECT ID_Caracteristica,Cantidad FROM caracteristicashabitacion WHERE ID_Habitacion=".$row['ID']);
											$cont=0;
											while($row2=mysql_fetch_array($result_car)){
												if(in_array($row2['ID_Caracteristica'], $carac)){													
													$cont++;
													}
											}
										
									
											if($cont==$tam && $completo==true){
												?><tr>
													<td><?php echo $row['ID'] ?></td>
													<td><?php echo $row['Precio'] ?></td>
													<td></td>
													<td><button class="btn btn-primary" onClick="location.href = 'index.php?cat=perfil&ID_Usuario=<?php echo $row['ID']?>'" >Ver Mas</button></td>
												</tr><?php
											}
										}
									}
									else{
                                    while ($row = mysql_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['ID'] ?></td>
                                            <td><?php echo $row['Precio'] ?></td>
                                            <td></td>
                                            <td><button class="btn btn-primary" onClick="location.href = 'index.php?cat=perfil&ID_Usuario=<?php echo $row['ID'] ?>'" >Ver Mas</button></td>
                                        </tr>
                                    <?php } } ?>
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

