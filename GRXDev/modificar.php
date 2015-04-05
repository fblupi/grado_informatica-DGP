
        <!--main-->
<div class="container" id="main">
    <div class="row">
        <?php 
        if(isset($_GET['error_sesion']))//Si existe un error de inicio de sesión se muestra el div de error
        {
        if($_GET['error_sesion'] == true){ ?>
        
        <div class="col-md-12 col-sm-12">
            <div class="alert alert-danger alert-dismissable">Error al iniciar sesi�n.</div>
        </div> 
        
        <?php }} ?>
        <?php 
		include "BD.php";
		$id = isset($_GET['ID_Usuario']) ? $_GET['ID_Usuario'] : null;
		$datos = new BD("localhost", "root", "", "GRXDev");
		if(empty($id)){
			$result = $datos->Query("select Nombre_usuario,Direccion_correo,Tipo_usuario,ID_Usuario,Nombre,Apellidos,Sexo,Fecha_nacimiento,ubicacion,NIF from 	Usuarios where ID_Usuario='".$_COOKIE['id_usuario']."'");
		}
		else{
			$result = $datos->Query("select Nombre_usuario,Direccion_correo,Tipo_usuario,ID_Usuario,Nombre,Apellidos,Sexo,Fecha_nacimiento,ubicacion,NIF from 	Usuarios where ID_Usuario='".$id."'");
		}
		//if(mysql_num_rows($result) > 0)
		$fila = mysql_fetch_array($result);
		?>
            <div class="col-md-12 col-sm-12">
                <div class="panel panel-default">
                <div class="panel-heading">Perfil</div>
					<div class="panel panel-default">
						<form method="post" action="script_modificardatos.php" id="form-usu">
						<?php 
						if($_COOKIE['tipo_usuario']==1){  //Si el usuario que modifica los datos es el administrador podra modificar unos datos
							if($fila['Tipo_usuario']==5){ //Si el usuario es de tipo dueño,mostraremos su nif?>
							<div class="panel-body"><strong style="margin-right:5px;">NIF:  </strong><?php echo $fila['NIF']?></div>
						<?php }?>
						
						<div class="panel-body"><strong style="margin-right:5px;">Nombre de usuario:  </strong><textarea rows="1" cols="50" name="nick"><?php echo $fila['Nombre_usuario']?></textarea></div>
						<div class="panel-body"><strong style="margin-right:5px;">Email:</strong><?php echo $fila['Direccion_correo']?></div>
						<div class="panel-body"><strong style="margin-right:5px;">Nombre: </strong><textarea rows="1" cols="50" name="nombre"><?php echo $fila['Nombre']?></textarea></div>
						
						<?php if($fila['Tipo_usuario']!=5){ //Si no es tipo dueño mostramos estos campos?>
							<div class="panel-body"><strong style="margin-right:5px;">Apellidos: </strong><textarea rows="1" cols="50" name="apellidos"><?php echo $fila['Apellidos']?></textarea></div>
							<div class="panel-body"><strong style="margin-right:5px;">Sexo: </strong><?php echo $fila['Sexo']?></div>
							<div class="panel-body"><strong style="margin-right:5px;">Fecha_nacimiento: </strong><?php echo $fila['Fecha_nacimiento']?></div>
							<div class="panel-body"><strong style="margin-right:5px;">Ubicacion: </strong><textarea rows="1" cols="50" name="ubicacion"><?php echo $fila['ubicacion']?></textarea></div>
						<?php }}?>
						<?php 
						if($_COOKIE['tipo_usuario']!=1){	//si el usuario no es administrador permite modificar otros parametros
							if($fila['Tipo_usuario']==5){ ?>
								<div class="panel-body"><strong style="margin-right:5px;">NIF:  </strong><textarea rows="1" cols="50" name="nif"><?php echo $fila['NIF']?></textarea></div>
							<?php } ?>
								<div class="panel-body"><strong style="margin-right:5px;">Nombre de usuario:  </strong><?php echo $fila['Nombre_usuario']?></div>
								<div class="panel-body"><strong style="margin-right:5px;">Email:</strong><textarea rows="1" cols="50" name="email"><?php echo $fila['Direccion_correo']?></textarea></div>
								<div class="panel-body"><strong style="margin-right:5px;">Nueva Contraseña: </strong><textarea rows="1" cols="50" name="contra"></textarea></div>
								<div class="panel-body"><strong style="margin-right:5px;">Repita Contraseña nueva: </strong><textarea rows="1" cols="50" name="ncontra"></textarea></div>
								<div class="panel-body"><strong style="margin-right:5px;">Nombre: </strong><textarea rows="1" cols="50" name="nombre"><?php echo $fila['Nombre']?></textarea></div>
							<?php if($fila['Tipo_usuario']!=5){ ?>
							<div class="panel-body"><strong style="margin-right:5px;">Apellidos: </strong><textarea rows="1" cols="50" name="apellidos"><?php echo $fila['Apellidos']?></textarea></div>
							<div class="panel-body"><strong style="margin-right:5px;">Sexo: </strong>
									<input type="radio" id="sexo" name="sexo" value="Hombre" checked>Hombre
                                    <input type="radio" id="sexo" name="sexo" value="Mujer">Mujer</div>
							<div class="panel-body"><strong style="margin-right:5px;">Fecha_nacimiento: </strong><textarea rows="1" cols="50" name="fecha"><?php echo $fila['Fecha_nacimiento']?></textarea></div>
							<div class="panel-body"><strong style="margin-right:5px;">Ubicacion: </strong><textarea rows="1" cols="50" name="ubicacion"><?php echo $fila['ubicacion']?></textarea></div>
						<?php }}?>
						
						<input type="hidden" value=<?php echo $fila['ID_Usuario'] ?> name="id"></input>
						<input type="hidden" value=<?php echo $fila['Tipo_usuario'] ?> name="tipo"></input>
						<div class="panel-body"><button class="btn btn-primary" type="submit" id="enviar" >Guardar</button></div></form>
						<div class="panel-body" style="margin-top:-2%;"><button class="btn btn-primary" onClick="location.href ='index.php?cat=perfil'" >No Guardar</button></div>
						
						
					</div>
					
                </div>
            </div>
        <div class="clearfix"></div>
	</div>
</div><!--/main-->
