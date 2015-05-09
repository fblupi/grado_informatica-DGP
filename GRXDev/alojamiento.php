
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

		$id = isset($_GET['ID_Alojamiento']) ? $_GET['ID_Alojamiento'] : null;

		$result = $datos->Query("SELECT ID, Nombre,Direccion,Descripcion FROM alojamiento WHERE ID=".$id);
		//if(mysql_num_rows($result) > 0)
		$fila2 = mysql_fetch_array($result);
		?>
      <div class="col-md-12 col-sm-12">
    	<div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4><?php echo $fila2['Nombre']?></h4></div>
   			<div class="panel-body">
			  <img src="./images/h_prueba.jpg" class="img-responsive img-thumbnail pull-center" style="margin-left:35%; width:30%; height:30%;">
			  <hr>
              <h5>Descripción<h5>
              <p><?php echo $fila2['Descripcion']?></p>
			  <h5>Caracteristicas<h5>
			  <?php
					
                    $result3=$datos->Query("SELECT ID_Caracteristicas, Cantidad from caracteristicasalojamiento where ID_Alojamiento=".$id);
					
                    
                    while($fila=mysql_fetch_array($result3))
                    {
						$result2=$datos->Query("SELECT * FROM caracteristicas WHERE ID_Caracteristicas=".$fila['ID_Caracteristicas']);
                        while(($fila2=mysql_fetch_array($result2)))
                        {

							echo '<div class="col-md-2 col-sm-2">';
							echo '<label for="'.$fila2['Descripcion'].'">'.$fila2['Descripcion'].': '.$fila['Cantidad'].'</label>';
							echo '</div>';
						}
                    }
			  
			  ?>
			  
              <div class="clearfix"></div>
			  <hr>
              <button class="btn btn-primary" style="margin-right:2%;"onClick="location.href ='index.php?cat=perfil&ID_Usuario=<?php echo $fila['ID_Usuario'] ?>'" >No Guardar</button><button style="margin-right:2%;" class="btn btn-primary" onClick="location.href ='index.php?cat=perfil&ID_Usuario=<?php echo $fila['ID_Usuario'] ?>'" >No Guardar</button><button class="btn btn-primary" style="margin-right:2%;" onClick="location.href ='index.php?cat=perfil&ID_Usuario=<?php echo $fila['ID_Usuario'] ?>'" >No Guardar</button>
            </div>
         </div>
	</div>
        <div class="clearfix"></div>
	</div>
</div><!--/main-->