<?php
include "BD.php";
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$datos = new BD("localhost", "root", "", "GRXDev");
if($tipo==''){
	$result=null;	
}
else{
	if($tipo==1){
		$result = $datos->Query("SELECT ID,Nombre,Direccion from alojamiento where ID_Validador=".$_COOKIE['id_usuario']." and Fecha_validacion=0");
	}
	if($tipo==2){
		$result = $datos->Query("SELECT ID,Nombre,Direccion from alojamiento where ID_Validador=0");
	}
	if($tipo==3){
		$result = $datos->Query("SELECT ID,Nombre,Direccion,ID_Validador from alojamiento where ID_Validador!=".$_COOKIE['id_usuario']." and ID_Validador!=0 and Fecha_validacion=0");
	}
}


?>
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4>Informe: No validados</h4></div>
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
										<?php if($tipo==3){
                                        echo "<th>Validador</th>";
										}
										else{
										echo "<th></th>";
										}
										?>
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
											<?php if($tipo==3){?>
											<td><?php echo $row['ID_Validador'] ?><td>
											<?php }
											else{?>
                                            <td></td>
											<?php }?>
											<?php if($tipo==1){?>
                                            <td><button class="btn btn-primary" onClick="location.href = 'script_validaralo.php?id=<?php echo $row['ID'] ?>'" >Validar</button>
											<button class="btn btn-primary" onClick="location.href = 'index.php?cat=alojamiento&alojamiento=<?php echo $row['ID'] ?>'" >Ver mas</button></td>
											<?php }?>
											<?php if($tipo==2){?>
                                             <td><button class="btn btn-primary" onClick="location.href = 'script_pediralo.php?id=<?php echo $row['ID'] ?>'" >Pedir</button>
											<button class="btn btn-primary" onClick="location.href = 'index.php?cat=alojamiento&alojamiento=<?php echo $row['ID'] ?>'" >Ver mas</button></td>
											<?php }?>
											<?php if($tipo==3){?>
                                            <td><button class="btn btn-primary" onClick="location.href = 'index.php?cat=script&id=<?php echo $row['ID'] ?>'" >Ver mas</button></td>
											<td></td>
											<?php }?>
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






