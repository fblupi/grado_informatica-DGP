<?php
include "BD.php";
$sexo=isset($_GET['sexo'])? $_GET['sexo'] : '';
$nick=isset($_GET['nick'])? $_GET['nick'] : '';
$email=isset($_GET['email'])? $_GET['email'] : '';
$nombre=isset($_GET['nombre'])? $_GET['nombre'] : '';
$apellidos=isset($_GET['apellidos'])? $_GET['apellidos'] : '';
$fecha=isset($_GET['fecha'])? $_GET['fecha'] : '';
$ubicacion=isset($_GET['ubicacion'])? $_GET['ubicacion'] : '';
$datos = new BD("localhost", "root", "", "GRXDev");
 
$result = $datos->Query("SELECT Nombre_usuario,Nombre,Apellidos,Sexo FROM usuarios WHERE sexo LIKE '".$sexo."%' and Nombre_usuario LIKE '".$nick."%' and Direccion_correo LIKE '".$email."%' and Nombre LIKE '".$nombre."%' and Apellidos LIKE '".$apellidos."%' and Fecha_Nacimiento LIKE '".$fecha."%' and Ubicacion LIKE '".$ubicacion."%'");
?>
<h4>Resultados</h4>
<div class="panel-body">
<ul class="list-group">
<li class="list-group-item">Nick Nombre Apellidos Sexo</li>
<?php
if(!empty($result)){
while($row=mysql_fetch_array($result)){
	?>
	<li class="list-group-item"><?php echo $row['Nombre_usuario']." ".$row['Nombre']." ".$row['Apellidos']." ".$row["Sexo"]; ?>
	<a href="">Editar</a> <a href="">Validar</a></li>

	<?php
	}
}
else{
?>
	<p>No se ha encontrado a nadie con esos parametros</p>
	
<?php
}

?>
</div>
