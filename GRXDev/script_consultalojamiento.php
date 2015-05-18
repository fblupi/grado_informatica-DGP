<?php
include 'conexionBD.php';
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$ubicacion = isset($_GET['ubicacion']) ? $_GET['ubicacion'] : '';

$piscina = isset($_GET['piscina']) ? $_GET['piscina'] : '';
$carac=array();
$tam=0;
if($piscina!=''){
	array_push($carac,$piscina);
	$tam++;
}
$wifi = isset($_GET['wifi']) ? $_GET['wifi'] : '';
if($wifi!=''){
	array_push($carac,$wifi);
	$tam++;
}
$spa = isset($_GET['spa']) ? $_GET['spa'] : '';
if($spa!=''){
	array_push($carac,$spa);
	$tam++;
}
$desayuno = isset($_GET['desayuno']) ? $_GET['desayuno'] : '';
if($desayuno!=''){
	array_push($carac,$desayuno);
	$tam++;
}

$nhabitacion = isset($_GET['nhabitacion']) ? $_GET['nhabitacion'] : '';
if($nhabitacion!=''){
	array_push($carac,7);
	$tam++;
}
$estrella = isset($_GET['estrella']) ? $_GET['estrella'] : '';
if($estrella!=''){
	array_push($carac,15);
	$tam++;
}
$precio = isset($_GET['precio']) ? $_GET['precio'] : '';
if($precio!=''){
	array_push($carac,16);
	$tam++;
}
$cafeteria = isset($_GET['cafeteria']) ? $_GET['cafeteria'] : '';
if($cafeteria!=''){
	array_push($carac,$cafeteria);
	$tam++;
}
$discoteca = isset($_GET['discoteca']) ? $_GET['discoteca'] : '';
if($discoteca!=''){
	array_push($carac,$discoteca);
	$tam++;
}
$pista = isset($_GET['pista']) ? $_GET['pista'] : '';
if($pista!=''){
	array_push($carac,$pista);
	$tam++;
}

//Comenzamos las caracteristicas de la habitacion
$carach=array();
$tamh=0;
$wifih = isset($_GET['wifih']) ? $_GET['wifih'] : '';
if($wifih!=''){
	array_push($carach,$wifih);
	$tamh++;
}
$ncamas = isset($_GET['ncamas']) ? $_GET['ncamas'] : '';
if($ncamas!=''){
	array_push($carach,6);
	$tamh++;
}
$bano = isset($_GET['bano']) ? $_GET['bano'] : '';
if($bano!=''){
	array_push($carach,9);
	$tamh++;
}
$precioh = isset($_GET['precioh']) ? $_GET['precioh'] : '';
if($precioh!=''){
	array_push($carach,17);
	$tamh++;
}
$tele = isset($_GET['tele']) ? $_GET['tele'] : '';
if($tele!=''){
	array_push($carach,$tele);
	$tamh++;
}
$caja = isset($_GET['caja']) ? $_GET['caja'] : '';
if($caja!=''){
	array_push($carach,$caja);
	$tamh++;
}
$armario = isset($_GET['armario']) ? $_GET['armario'] : '';
if($armario!=''){
	array_push($carach,$armario);
	$tamh++;
}
$fechae = isset($_GET['fechae']) ? $_GET['fechae'] : '';
$fechas = isset($_GET['fechas']) ? $_GET['fechas'] : '';
$fechae = strtotime($fechae);
$fechas = strtotime($fechas);
$fechae = date('Y-m-d',$fechae);
$fechas = date('Y-m-d',$fechas);
$habitaciones_bus=false;
//Comprobamos que hay algun campo "relleno"
if($nombre=='' && $tipo=='' && $ubicacion=='' && $piscina=='' && $wifi=='' && $spa=='' && $desayuno=='' && $nhabitacion=='' && $estrella=='' && $cafeteria=='' && $discoteca=='' && $pista=='' 
&& $wifih=='' && $ncamas=='' && $bano=='' && $tele=='' && $caja=='' && $armario=='' && $precio=='' && $precioh=='' && $fechae=='' && $fechas==''){
	$result=null;
}
else{
$result = $datos->Query("SELECT ID, Nombre,Direccion,Descripcion,Tipo_alojamiento FROM alojamiento WHERE Nombre LIKE '%" . $nombre . "%' and Tipo_alojamiento LIKE '%" . $tipo . "%' and Direccion LIKE '%" . $ubicacion . "%'"." and Fecha_validacion!=0");

}
?>
<div class="col-md-12 col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Resultados</h4></div>
        <div class="panel-body">
            <?php if (!empty($result)) { ?>
                    <div class="row">
                        <div class="table-responsive">
							<form action="index.php?cat=reserva_multiple" method="post">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
										<th></th>
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
									$cnhabitacion='';
									if(!empty($carac) || !empty($carach) || $nhabitacion!=''){
										while($row = mysql_fetch_array($result)){
											$completo=true;
											$result_car = $datos->Query("SELECT ID_Caracteristicas,Cantidad FROM caracteristicasalojamiento WHERE ID_Alojamiento=".$row['ID']);
											$cont=0;
											while($row2=mysql_fetch_array($result_car)){
												if(in_array($row2['ID_Caracteristicas'], $carac)){													
													if($row2['ID_Caracteristicas']==7 || $row2['ID_Caracteristicas']==15 || $row2['ID_Caracteristicas']==16){
														if($row2['ID_Caracteristicas']==7 && $row2['Cantidad']==$nhabitacion){
															$cont++;
														}
														elseif($row2['ID_Caracteristicas']==15 && $row2['Cantidad']==$estrella){
															$cont++;
														}
														elseif($row2['ID_Caracteristicas']==16 && $row2['Cantidad']<=$precio){
															$cont++;
														}
													} 
													else{
														$cont++;
													}
												}
											}
										
									
											if($cont==$tam && $completo==true){
												if(empty($carach)){
													if($fechae!='' && $fechas!=''){
															$cadena = "select count(*) from reserva_alojamiento where ID_Alojamiento = ".$row['ID']." AND (((Fecha_entrada BETWEEN '$fechae' AND '$fechas') OR (Fecha_salida BETWEEN '$fechae' AND '$fechas')) OR ((Fecha_entrada < '$fechae') AND (Fecha_salida > '$fechas')))" ;
															$select = $datos->Query($cadena);
															if($select){
																$rowp = mysql_fetch_array($select);
															if($rowp[0] == 0){	
																?>
																<tr>
																<td></td>
																<td><?php echo $row['Nombre'] ?></td>
																<td><?php echo $row['Direccion'] ?></td>
																<td></td>
																										
																<td></td>
																<td><button type="reset" class="btn btn-primary" onClick="location.href = 'index.php?cat=alojamiento&ID_Alojamiento=<?php echo $row['ID']?>'" >Ver Mas</button></td>
																</tr>
																<?php
																}
															}
														}
												}//if(empty($carach)){
												else{
													$result_carh = $datos->Query("SELECT ID FROM habitacion WHERE ID_Alojamiento=".$row['ID']." and Habilitado!=0");
													while($rowh = mysql_fetch_array($result_carh)){
														$completoh=true;
														$result_cart = $datos->Query("SELECT ID_Caracteristica,Cantidad FROM caracteristicashabitacion WHERE ID_Habitacion=".$rowh['ID']);
														$conth=0;
														/*?><tr><td><?php echo " ".$rowh['ID']. " = ".$tamh ?></td></tr><?php*/
														if(!empty($result_cart)){
														while($rowh2=mysql_fetch_array($result_cart)){
															if(in_array($rowh2['ID_Caracteristica'], $carach))	{
																if($rowh2['ID_Caracteristica']==6 || $rowh2['ID_Caracteristica']==9 || $rowh2['ID_Caracteristica']==17){
																	if($rowh2['ID_Caracteristica']==6 && $rowh2['Cantidad']==$ncamas){
																		$conth++;
																	}
																	elseif($rowh2['ID_Caracteristica']==9 && $rowh2['Cantidad']==$bano){
																		$conth++;
																	}
																	elseif($rowh2['ID_Caracteristica']==17 && $rowh2['Cantidad']<=$precioh){
																		$conth++;
																	}
																} 
																else{
																	$conth++;
																}															
															}
														}
														if($conth==$tamh && $completoh==true){
															if($fechae!='' && $fechas!=''){
																$cadena = "select count(*) from reserva_habitacion where ID_Habitacion = ".$rowh['ID']." AND (((Fecha_entrada BETWEEN '$fechae' AND '$fechas') OR (Fecha_salida BETWEEN '$fechae' AND '$fechas')) OR ((Fecha_entrada < '$fechae') AND (Fecha_salida > '$fechas')))" ;
																$select = $datos->Query($cadena);
																if($select){
																	$rowp = mysql_fetch_array($select);
																if($rowp[0] == 0){
																$habitaciones_bus=true;
															?><tr>
																<td><?php echo $rowh['ID'] ?></td>
																<td><?php echo $row['Nombre'] ?></td>
																<td><?php echo $row['Direccion'] ?></td>
																<td></td>                               
																<td></td>
																<td><button type="reset" class="btn btn-primary" onClick="location.href = 'index.php?cat=alojamiento&ID_Alojamiento=<?php echo $row['ID']?>'" >Ver Mas</button></td>
																<?php
																if($row['Tipo_alojamiento']==1){?>
																<td><button type="reset" class="btn btn-primary" onClick="location.href = 'index.php?cat=habitacion&ID_Habitacion=<?php echo $rowh['ID']?>'" >Ver Habitacion</button></td>
																<td><input type="checkbox" id="<?php echo $rowh['ID']?>" value="<?php echo $rowh['ID']?>" name="habitacion[]"  ></td>
																<?php }?>
															</tr><?php 
																}
															}
															}
															
															
														}//if($conth==$tamh && $completoh==true){
														}//if(!empty($result_cart)){
													
													}//while($rowh = mysql_fetch_array($result_carh))
												}//else
											} 
										}
									}
									else{
                                    while ($row = mysql_fetch_array($result)){
										if($fechae!='' && $fechas!=''){
											$cadena = "select count(*) from reserva_alojamiento where ID_Alojamiento = ".$row['ID']." AND (((Fecha_entrada BETWEEN '$fechae' AND '$fechas') OR (Fecha_salida BETWEEN '$fechae' AND '$fechas')) OR ((Fecha_entrada < '$fechae') AND (Fecha_salida > '$fechas')))" ;
											$select = $datos->Query($cadena);
											if($select){
												$rowp = mysql_fetch_array($select);
											if($rowp[0] == 0){	
												?>
												<tr>
												<td></td>
												<td><?php echo $row['Nombre'] ?></td>
												<td><?php echo $row['Direccion'] ?></td>
												<td></td>
                                                                                        
												<td></td>
												<td><button type="reset" class="btn btn-primary" onClick="location.href = 'index.php?cat=alojamiento&ID_Alojamiento=<?php echo $row['ID']?>'" >Ver Mas</button></td>
												</tr>
												<?php
												}
											}
										}
										} }}?>
                                </tbody>
                            </table>
							<?php if($habitaciones_bus==true){?>
								<button type="submit" class="btn btn-success" style="margin-left:2%;" > Realizar reserva</button></form>
							<?php}?>
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

