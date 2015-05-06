<?php
include 'conexionBD.php';

$nif = isset($_GET['nif']) ? $_GET['nif'] : '';
$nick = isset($_GET['nick']) ? $_GET['nick'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';

$validado = isset($_GET['validado']) ? $_GET['validado'] : '';

if($validado=='' && $nif=='' && $nick=='' && $email=='' && $nombre==''){
	$result=null;
}
elseif($validado==''){
$result = $datos->Query("SELECT NIF,ID_Usuario, Nombre_usuario,Nombre,Tipo_usuario,Validador FROM usuarios WHERE NIF LIKE '%" . $nif . "%' and Nombre_usuario LIKE '%" . $nick . "%' and Direccion_correo LIKE '%" . $email . "%' and Nombre LIKE '%" . $nombre . "%' and Tipo_usuario=5");
}
elseif($validado=='si'){
$result = $datos->Query("SELECT NIF,ID_Usuario, Nombre_usuario,Nombre,Tipo_usuario,Validador FROM usuarios WHERE NIF LIKE '%" . $nif . "%' and Nombre_usuario LIKE '%" . $nick . "%' and Direccion_correo LIKE '%" . $email . "%' and Nombre LIKE '%" . $nombre . "%' and Tipo_usuario=5 and Validador!=0");
}
else{
$result = $datos->Query("SELECT NIF,ID_Usuario, Nombre_usuario,Nombre,Tipo_usuario,Validador FROM usuarios WHERE NIF LIKE '%" . $nif . "%' and Nombre_usuario LIKE '%" . $nick . "%' and Direccion_correo LIKE '%" . $email . "%' and Nombre LIKE '%" . $nombre . "%' and Tipo_usuario=5 and Validador=0");
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
										<th>NIF</th>
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Validador</th>
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
                                            <td><?php echo $row['ID_Usuario'] ?></td>
											<td><?php echo $row['NIF'] ?></td>
                                            <td><?php echo $row['Nombre_usuario'] ?></td>
                                            <td><?php echo$row['Nombre'] ?></td>
                                            <td><?php echo$row['Validador'] ?></td>
                                            <td></td>
                                            
                                            <?php 
                                            //Obtenemos los atributos del usuario a comprobar; En este caso si tiene validador
                                            $id_usuario = $row['ID_Usuario'];
                                            $atributos_usuario = $datos->Query("Select Validador FROM usuarios WHERE ID_Usuario='$id_usuario'");
                                            $fila = mysql_fetch_row($atributos_usuario);
                                            $validador = $fila[0];
                                            ?>  
                                            
                                            <td><button class="btn btn-success" <?php if($validador!=0){ ?> disabled <?php } ?> onClick="location.href = 'script_validar_dueno.php?ID_Usuario=<?php echo $row['ID_Usuario'] ?>'" >Validar</button></td>
                                            <td><button class="btn btn-primary" onClick="location.href = 'index.php?cat=perfil&ID_Usuario=<?php echo $row['ID_Usuario'] ?>'" >Ver Perfil</button></td>
                                            <td><button class="btn btn-danger" onClick="location.href = 'script_baja_usuario.php?ID_Usuario=<?php echo $row['ID_Usuario'] ?>'" >Dar de baja</button></td>
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
</div>

