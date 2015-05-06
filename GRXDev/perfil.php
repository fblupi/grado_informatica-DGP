
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
		<?php //para los fallos a la hora de modificar
        if(isset($_GET['fallo']))
        {
        if($_GET['fallo'] == "hueco"){ ?>
        
        <div class="col-md-12 col-sm-12">
            <div class="alert alert-danger alert-dismissable">No ha rellenado todos los campos necesarios.</div>
        </div> 
        
        <?php }
		//para los fallos al introducir la contraseña actual
        if($_GET['fallo'] == "actual"){ ?>
        
        <div class="col-md-12 col-sm-12">
            <div class="alert alert-danger alert-dismissable">Contraseña actual Incorrecta.</div>
        </div> 
        
        <?php }
		if($_GET['fallo'] == "contra"){ ?>
		
		<div class="col-md-12 col-sm-12">
            <div class="alert alert-danger alert-dismissable">Las contraseñas no coinciden</div>
        </div> 
		<?php }} ?>
		<?php 
        if(isset($_GET['exito']))//Si se han realizado la modificacion bien
        {
        if($_GET['exito'] == "modi"){ ?>
        
        <div class="col-md-12 col-sm-12">
            <div class="alert alert-success">Se han realizado los cambios.</div>
        </div> 
        
        <?php }} ?>
		
        <?php
        include 'conexionBD.php';

		$id = isset($_GET['ID_Usuario']) ? $_GET['ID_Usuario'] : null;

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
						<?php
							if($fila['Tipo_usuario']==5){
						?>
						<div class="panel-body"><strong style="margin-right:5px;">NIF:  </strong><?php echo $fila['NIF']?></div>
						<?php }?>
						<div class="panel-body"><strong style="margin-right:5px;">Nombre de usuario:  </strong><?php echo $fila['Nombre_usuario']?></div>
						<div class="panel-body"><strong style="margin-right:5px;">Email:</strong><?php echo $fila['Direccion_correo']?></div>
						<div class="panel-body"><strong style="margin-right:5px;">Contraseña:  </strong>****</div>
						<div class="panel-body"><strong style="margin-right:5px;">Nombre: </strong><?php echo $fila['Nombre']?></div>
						<?php
							if($fila['Tipo_usuario']!=5){
						?>
						<div class="panel-body"><strong style="margin-right:5px;">Apellidos: </strong><?php echo $fila['Apellidos']?></div>
						<div class="panel-body"><strong style="margin-right:5px;">Sexo: </strong><?php echo $fila['Sexo']?></div>
						<div class="panel-body"><strong style="margin-right:5px;">Fecha_nacimiento: </strong><?php echo $fila['Fecha_nacimiento']?></div>
						<div class="panel-body"><strong style="margin-right:5px;">Ubicacion: </strong><?php echo $fila['ubicacion']?></div>
						<?php }?>
						
						<div class="panel-body"><button class="btn btn-primary" onClick="location.href = 'index.php?cat=modificar&ID_Usuario=<?php echo $fila['ID_Usuario'] ?>'" >Modificar</button></div>
					</div>
					
                </div>
            </div>
        <div class="clearfix"></div>
	</div>
</div><!--/main-->