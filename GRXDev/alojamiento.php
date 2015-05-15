
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
			  <h5>Comentarios<h5>
  
			<!--Seccion de opiniones de los usuarios  -->
			<div id="opinion">
				<?php 
					$select="SELECT * FROM comentarioalojamiento WHERE ID_Alojamiento=".$id;
					$result=$datos->Query($select);
					while($row=mysql_fetch_array($result)){
						$usu="SELECT * FROM usuarios WHERE ID_Usuario=".$row['ID_Usuario'];
						$result2=$datos->Query($usu);
						$rowu=mysql_fetch_array($result2)
					?>
					<!--Comentario   -->
					<div class="comentario">
					<h6><?php echo $rowu['Nombre_usuario']."  ".$row['Fecha']." ".$row['Hora']; ?><a >Borrar Comentario</a></h6>
					<p><?php echo $row['Comentario']; ?></p>
					</div>
					<?php
					}
				?>

			  </div>
			  <!-- Formulario de comentario-->
			  <form action="script_nuevo_comentario.php" method="post">
			  <p>Añade tu comentario</p>
			  <textarea type="text" id="comentario" rows="5" name="comentario" class="form-control" value=""></textarea>
			  <input type="hidden" name="id" value="<?php  echo $id?>">
			  <button type="submit" class="btn btn-success" style="margin-top:2%;" > Añadir comentario</button>
			  </form>
              <div class="clearfix"></div>
			  <hr>
              <?php $result=$datos->Query("SELECT * FROM alojamiento WHERE ID='$id'");
                    if($fila=mysql_fetch_array($result)){
                        $tipo=$fila['Tipo_alojamiento'];
                        if($tipo==2){
                            echo '<button class="btn btn-primary" style="margin-right:2%;" onClick="location.href = \'index.php?cat=reserva_alojamiento&ID_Alojamiento='.$id.'\'" >Reservar</button>';
                        }
                    }

              ?>

            </div>
         </div>
	</div>
        <div class="clearfix"></div>
	</div>

        <div class="col-md-12 col-sm-12">
        <div class="panel panel-warning">
            <div class="panel-heading"><h4>Habitaciones de este alojamiento</h4></div>
            <div class="panel-body">
                <?php $result=$datos->Query("SELECT * FROM habitacion WHERE ID_Alojamiento='".$id."'")?>
                <?php if($result){?>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Habilitado</th>
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
                            while ($row = mysql_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['ID'] ?></td>
                                    <td><?php if($row['Habilitado']=='0'){ echo 'NO'; }else { echo 'SI';} ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><button class="btn btn-danger" onClick="location.href = 'index.php?cat=reserva_habitacion&ID_Habitacion=<?php echo $row['ID'] ?>'" >Realizar reserva</button></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 text-center">
                        <ul class="pagination pagination-lg pager" id="myPager"></ul>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
</div><!--/main-->