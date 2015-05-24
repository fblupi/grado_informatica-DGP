
<div class="container" id="main">
    <?php if ((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result) == 0) { ?>
        <div class="col-md-12 col-sm-12">
            <div class="alert alert-info alert-dismissable">Error al iniciar sesi�n.</div>
        </div>
    <?php } ?>

    <div class="row">
        <?php if(isset($_GET['creacion'])){
            $creacion=$_GET['creacion'];
            switch($creacion){
                case 'exito':
                    echo '<div class="col-md-12 col-sm-12">
                            <div class="alert alert-success">El alojamiento ha sido creado con éxito.</div>
                          </div> ';
                    break;
            }
        }?>
        <div center-block">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4>Añadir alojamiento</h4></div>
                <div class="panel-body">
                <form enctype="multipart/form-data" class="form col-md-12" action="script_nuevo_alojamiento.php" method="post">
                    <div class="form-group col-md-3 col-sm-3">    
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="add_nombre" class="form-control">
                    </div>
                    <div class="form-group col-md-5 col-sm-5">    
                        <label for="nombre">Dirección</label>
                        <input type="text" id="nombre" name="add_direccion" class="form-control" >
                    </div>
                    <div class="form-group col-md-4 col-sm-2">  
                        <label for="tipo">Tipo</label>
                        <select name="add_tipo" id="estrella" class="form-control">
                            <option value="1">Hotel</option>
                            <option value="2">Casa rural</option>
							<option value="3">Piso-parcial</option>
							<option value="4">Piso completo</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-2">
                        <label for="nombre">Imagen</label>
                        <input type="file" name="uploadedfile" />
                    </div>
                    <div style="clear:left"></div>
                    <div class="form-group col-md-9 col-sm-9">    
                        <label for="nombre">Descripción</label>
                        <textarea type="text" id="nombre" rows="5" name="add_descripcion" class="form-control"></textarea>
                    </div>
                    <div style="clear:left"></div>
                    <div class="form-group col-md-2 col-sm-2">
                        <label for="nombre">Audio de descripción</label>
                        <input type="file" name="uploadedaudio" />
                    </div>
                    <div style="clear:left"></div>
                    <div class="form-group col-md-2 col-sm-2">
                        <label for="nombre">Video en lengua de signos</label>
                        <input type="file" name="uploadedvideo" />
                    </div>
                    <div style="clear:left"></div>
                    <div class="panel-heading"><h4>Servicios</h4></div>
                        <div class="panel-body">
                    <?php
                    
                    include 'conexionBD.php';
                    $result=$datos->Query("SELECT * FROM caracteristicas WHERE tipo='0' order  by Tipo_check");
                    while($fila=mysql_fetch_array($result)){

                        if($fila['Tipo_check']=='1'){
                            echo '<div class="col-md-2 col-sm-2">';
                            echo '<label for="'.$fila['Descripcion'].'">'.$fila['Descripcion'].'</label>';
                            echo '<input type="checkbox"  name="'.$fila['ID_Caracteristicas'].'" value="'.$fila['ID_Caracteristicas'].'" >';
                        }else{
                            echo '<div class="form-group col-md-2 col-sm-2">';
                            echo '<label for="'.$fila['Descripcion'].'">'.$fila['Descripcion'].'</label>';
                            echo '<input type="text" id="'.$fila['ID_Caracteristicas'].'" name="'.$fila['ID_Caracteristicas'].'" class="form-control" >';
                        }
                        echo '</div>';
                    }
                    ?>

                    <div class="form-group col-md-9 col-sm-9" style="clear:left">
                        <button type="submit" class="btn btn-success" >Nuevo alojamiento</button>
                    </div>
                        </div>
                    </div>
                </form>  	
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4>Buscar Alojamientos</h4></div>
                <div class="panel-body">
                    <div class="col-md-3 col-sm-3">    
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" onkeyup="MostrarConsultaGestionAlojamiento();">
                    </div>
					<div class="col-md-3 col-sm-3">   
                    <label for="ubicacion">Ubicacion</label>
                    <input type="text" id="ubicacion" name="ubicacion" class="form-control" onkeyup="MostrarConsultaGestionAlojamiento();">
                    </div>
                    <div class="col-md-3 col-sm-3">   
					<label for="tipo">Tipo de alojamiento</label>
                    <select name="tipo" id="tipo" class="form-control" onchange="MostrarConsultaGestionAlojamiento();">
                        <option value="">--</option>
                        <option value="1">Hotel</option>
                        <option value="2">Casa Rural</option>
                        <option value="3">Piso-parcial</option>
                        <option value="4">Piso completo</option>
                    </select>	
                    </div>		
                </div>
            </div>
        </div>
                            <div id="resultado_busqueda">
                    </div>
        <div class="clearfix"></div>
    </div>
</div><!--/main-->
