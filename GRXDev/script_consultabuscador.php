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

$result = $datos->Query("SELECT Nombre_usuario,Nombre,Apellidos,Sexo,Tipo_usuario FROM usuarios WHERE sexo LIKE '%" . $sexo . "%' and Nombre_usuario LIKE '%" . $nick . "%' and Direccion_correo LIKE '%" . $email . "%' and Nombre LIKE '%" . $nombre . "%' and Apellidos LIKE '%" . $apellidos . "%' and Fecha_Nacimiento LIKE '%" . $fecha . "%' and Ubicacion LIKE '%" . $ubicacion . "%'");
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
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Sexo</th>
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
                                            <td><?php echo $row['Nombre_usuario'] ?></td>
                                            <td><?php echo$row['Nombre'] ?></td>
                                            <td><?php echo$row['Apellidos'] ?></td>
                                            <td><?php echo$row['Sexo'] ?></td>
                                            <td><button class="btn btn-success" onClick="location.href = 'script_validar.php'" >Validar</button></td>
                                            <td><button class="btn btn-primary" onClick="location.href = 'script_modificar_usuario.php?nombre_usuario=<?php echo $row['Nombre_usuario'] ?>'" >Modificar</button></td>
                                            <td><button class="btn btn-danger" onClick="location.href = 'script_baja_usuario.php?nombre_usuario=<?php echo $row['Nombre_usuario'] ?>'" >Dar de baja</button></td>
                                            <?php if($row['Tipo_usuario'] != 1){?>
                                            <td><button class="btn btn-warning" onClick="location.href = 'script_dar_priv_adm.php?nombre_usuario=<?php echo $row['Nombre_usuario'] ?>'" >Convertir en Administrador</button></td>  
                                            <?php } else { ?>
                                            <td><button class="btn btn-warning" onClick="location.href = 'script_quitar_priv_adm.php?nombre_usuario=<?php echo $row['Nombre_usuario'] ?>'" >Deja de ser administrador</button></td>
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

