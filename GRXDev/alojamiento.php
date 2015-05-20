
        <!--main-->
		<link href="css/estrellas.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
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
        $result = $datos->Query("SELECT ID, Nombre,Direccion,Descripcion,src_img,src_audio,src_video FROM alojamiento WHERE ID=".$id);
		//if(mysql_num_rows($result) > 0)
		$fila2 = mysql_fetch_array($result);
	
                if(isset($_COOKIE['id_usuario']))
                {
                    $valoraciones = $datos->Query("Select count(*) from valoracionalojamiento where ID_Alojamiento=".$id." AND ID_Usuario=".$_COOKIE['id_usuario']);
                    $valoracion_row = mysql_fetch_array($valoraciones);
                    if($valoracion_row[0] != "0")
                    {
                            $yavalorado = true;
                    }
                    else
                    {
                            $yavalorado = false;
                            if(isset($_GET['Valoracion']))
                            {
                                    $insertar = $datos->Query("insert into valoracionalojamiento (ID_Alojamiento,ID_Usuario,valoracion) values (".$id.",".$_COOKIE['id_usuario'].",".$_GET['Valoracion'].")");
                                    if($insertar==true)
                                    {
                                            $yavalorado = true;
                                    }	
                            }
                    }
                }
		?>
      <div class="col-md-12 col-sm-12">
    	<div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> 
		   <h4>
		   <?php echo $fila2['Nombre'];
				//COMPROBAMOS QUE SE HA VISITADO EL ALOJAMIENTO O ALGUNA DE SUS HABITACIONES POR EL USUARIO, ANTERIOR A LA FECHA DE HOY
                   $existe_reserva = false;
				   if(isset($_COOKIE['id_usuario']))
				   {
                   $reservas_alojamiento = $datos->Query("select count(*) from reserva_alojamiento where Fecha_salida < NOW() AND ID_USUARIO='".$_COOKIE['id_usuario']."' AND ID_ALojamiento=".$id);
                   $reservas_alojamiento_row = mysql_fetch_array($reservas_alojamiento);
                   if($reservas_alojamiento_row[0] == 0)
                   {
                       $reservas_habitacion = $datos->Query("select COUNT(RH.ID_Habitacion) from Reserva_habitacion RH, Habitacion H where H.ID_Alojamiento = '".$id."' AND RH.ID_Usuario = '".$_COOKIE['id_usuario']."' AND RH.Fecha_salida < NOW() AND RH.ID_HABITACION = H.ID");
						$reservas_habitacion_row = mysql_fetch_array($reservas_habitacion);
						if($reservas_habitacion_row[0] == 0)
						{
							$exite_reserva = false;
						}
						else
						{
							$existe_reserva = true;
						}
                   }
                   else
                   {
                       $existe_reserva = true;
                   }
				   }
			   //FIN DE COMPROBACION DE VISITA
		   if((isset($yavalorado) && $yavalorado == true) || (!isset($_COOKIE['id_usuario'])) || $existe_reserva == false)
		   {
                            $total = $datos->Query("Select AVG(valoracion) from valoracionalojamiento where ID_Alojamiento=".$id);
                            $total_row = mysql_fetch_array($total);
                            if($total_row[0] == null)
                            {
                                $media = "3";
                            }
                            else
                            {
                                $media = $total_row[0];
                            }
			   ?>
			    <div class="progress" style="width:50%; height:20px">
					<div class="progress-bar progress-bar-success" style="width:<?php echo (intval($media)*20); ?>%">Valoración: <?php echo intval($media);?>/5</div>
				</div>
			   <?php
		   }
		   else
		   {
		   ?>
		   <div class="ec-stars-wrapper">
				<a onClick="valorar(1)" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
				<a onClick="valorar(2)" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
				<a onClick="valorar(3)" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
				<a onClick="valorar(4)" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
				<a onClick="valorar(5)" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
			</div>
			<noscript>Necesitas tener habilitado javascript para poder votar</noscript>
		   <?php } ?>
		   </h4></div>
   			<div class="panel-body">
                <?php if($fila2['src_img']==null) {
                    echo '<img src="./images/h_prueba.jpg" class="img-responsive img-thumbnail pull-center" style="margin-left:35%; width:30%; height:30%;">';
                }else{
                    echo '<img src="'.$fila2['src_img'].'" class="img-responsive img-thumbnail pull-center" style="margin-left:35%; width:30%; height:30%;">';
                }?>
			  <hr>
              <h5>Descripción<h5>
              <p><?php echo $fila2['Descripcion']?></p>
              <?php if($fila2['src_audio']!=null) {?>
                  <h5>Descripción auditiva</h5>
                  <audio controls>
                      <source src="<?php echo $fila2['src_audio'] ?>" type="audio/mpeg">
                  </audio>
              <?php }?>

              <?php if($fila2['src_video']!=null) { ?>
                  <h5>Descripción en lengua de signos</h5>
                  <video width="320" height="240" controls>
                      <source src="<?php echo $fila2['src_video'] ?>" type="video/mp4">
                  </video>
              <?php }?>
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
			  <h5>Foto<h5>
  
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
					<h6><?php echo $rowu['Nombre_usuario']."  ".$row['Fecha']." ".$row['Hora']." ".$row['ID_Comentario']; 
					if(isset($_COOKIE['id_usuario']) && ($row['ID_Usuario']==$_COOKIE['id_usuario'])){ ?>
					<a href="script_eliminar_comentario.php?ID_Comentario=<?php echo $row['ID_Comentario']; ?>&alo=<?php echo $id?>">Borrar Comentario</a> <?php }?>
					</h6>
					<p><?php echo $row['Comentario']; ?></p>
					</div>
					<?php
					}
				?>

			  </div>
			  <!-- Formulario de comentario-->
			  <?php if(isset($_COOKIE['sesion_iniciada']) && $_COOKIE['sesion_iniciada']==true){ ?>
			  <form action="script_nuevo_comentario.php" method="post">
			  <p>Añade tu comentario</p>
			  <textarea type="text" id="comentario" rows="5" name="comentario" class="form-control" value=""></textarea>
			  <input type="hidden" name="id" value="<?php  echo $id?>">
			  <button type="submit" class="btn btn-success" style="margin-top:2%;" > Añadir comentario</button>
			  </form>
			  <?php } ?>
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

		   <script>
		   function valorar(valoracion) 
		   {
			   var direccion = window.location.href;
			   valoracion = "Valoracion="+valoracion;
				window.location.assign(direccion+"&"+valoracion);
		   }
		   </script>