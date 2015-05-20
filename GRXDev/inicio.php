<?php 
include 'conexionBD.php';
?>
        <!--main-->
<div class="container" id="main">
     <div class="col-md-12 col-sm-12">
    	<div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Alojamientos Destacados</h4></div>
        <div class="panel-body"> 
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
	$select="SELECT * FROM valoracionalojamiento ORDER BY Valoracion";
	$result=$datos->query($select);
	$cont=0;
	while($row = mysql_fetch_array($result)){
		if($cont<3){
			$select2="SELECT * FROM alojamiento WHERE ID=".$row['ID_Alojamiento'];
			$cont++;
			$result2=$datos->query($select2);
			$rowalo = mysql_fetch_array($result2);
			if($rowalo['src_img']==null){
				$imagen="images/h_prueba.jpg";
			}
			else{
				$imagen=$rowalo['src_img'];
			}
			?>
			<div class="col-md-4 col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4><?php echo $rowalo['Nombre'] ?></h4></div>
					<div class="panel-body">
					<img src="<?php echo $imagen?>" class="img-responsive img-thumbnail pull-center" style="margin-left:5%; width:90%; height:40%;">
					<div class="clearfix"></div>
					<hr>
					<div style="height:15%">
					<p><?php echo $rowalo['Descripcion']?></p>
					</div>
					<div class="clearfix"></div>
					<hr>
					<button class="btn btn-primary" style="margin-left:25%" onClick="location.href = 'index.php?cat=alojamiento&ID_Alojamiento=<?php echo $rowalo['ID']?>'" >Ver Mas</button>
					<div class="clearfix"></div>                            
            </div>
         </div> 
    </div>	
			<?php
		}
	}
	
	?>
    </div><!--/articles-->		
</div>	
</div>		
</div>
    </div>
        <div class="clearfix"></div>
	</div><!--/Cuerpo-->
</div><!--/main-->