<?php
include "BD.php";
$sexo = isset($_GET['sexo']) ? $_GET['sexo'] : '';
$nick = isset($_GET['nick']) ? $_GET['nick'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$apellidos = isset($_GET['apellidos']) ? $_GET['apellidos'] : '';
$fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';
$ubicacion = isset($_GET['ubicacion']) ? $_GET['ubicacion'] : '';
$datos = new BD("localhost", "root", "", "GRXDev");

$result = $datos->Query("SELECT ID_Usuario, Nombre_usuario,Nombre,Apellidos,Sexo,Tipo_usuario FROM usuarios WHERE sexo LIKE '%" . $sexo . "%' and Nombre_usuario LIKE '%" . $nick . "%' and Direccion_correo LIKE '%" . $email . "%' and Nombre LIKE '%" . $nombre . "%' and Apellidos LIKE '%" . $apellidos . "%' and Fecha_Nacimiento LIKE '%" . $fecha . "%' and Ubicacion LIKE '%" . $ubicacion . "%'");
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
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Sexo</th>
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
                                            <td><?php echo $row['Nombre_usuario'] ?></td>
                                            <td><?php echo$row['Nombre'] ?></td>
                                            <td><?php echo$row['Apellidos'] ?></td>
                                            <td><?php echo$row['Sexo'] ?></td>
                                            
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
                                            <?php if($row['Tipo_usuario'] != 1){ //No es administrador?>
                                            <td><button class="btn btn-warning" onClick="location.href = 'script_dar_priv_adm.php?ID_Usuario=<?php echo $row['ID_Usuario'] ?>'" >+ Admin.</button></td>  
                                            <?php } else { ?>
                                            <td><button class="btn btn-warning" onClick="location.href = 'script_quitar_priv_adm.php?ID_Usuario=<?php echo $row['ID_Usuario'] ?>'" >- Admin.</button></td>
                                            <?php } ?>
                                            <?php if($row['Tipo_usuario']!= 2){ //Distinto de adm y validador?>
                                            <td><button class="btn btn-info" onClick="location.href = 'script_dar_priv_validador.php?ID_Usuario=<?php echo $row['ID_Usuario'] ?>'" >+ Valid.</button></td>  
                                            <?php } else { ?>
                                            <td><button class="btn btn-info" onClick="location.href = 'script_quitar_priv_validador.php?ID_Usuario=<?php echo $row['ID_Usuario'] ?>'" >- Valid.</button></td>
                                            <?php } ?>
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
                <p>No se ha encontrado a nadie con esos parametros</p>

                <?php
            }
            ?>
        </div>
    </div>
</div>
</div>

