<div class="container" id="main">
    <div class="row">
        <?php if ((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result) == 0) { ?>
            <div class="col-md-12 col-sm-12">
                <div class="alert alert-info alert-dismissable">Error al iniciar sesi�n.</div>
            </div>
        <?php } ?>
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4>Buscar Alojamientos</h4></div>
                <div class="panel-body">
                    <div class="col-md-3 col-sm-3">    
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" onkeyup="MostrarConsultalojamiento();">
                    </div>
					<div class="col-md-3 col-sm-3">   
                    <label for="ubicacion">Ubicacion</label>
                    <input type="text" id="ubicacion" name="ubicacion" class="form-control" onkeyup="MostrarConsultalojamiento();">
                    </div>
                    <div class="col-md-3 col-sm-3">  
                    <label for="precio">Precio</label>
                    <input type="text" id="precio" name="precio" class="form-control" onkeyup="MostrarConsultalojamiento();">
                    </div>
                    <div class="col-md-3 col-sm-3">  
					<label for="estrella">Estrellas</label>
                    <select name="estrella" id="estrella" class="form-control" onchange="MostrarConsultalojamiento();">
						<option value="">--</option>
                        <option value="1">1 estrella</option>
                        <option value="2">2 estrellas</option>
                        <option value="3">3 estrellas</option>
						<option value="4">4 estrellas</option>
						<option value="5">5 estrellas</option>
                    </select>
					</div>	
                    <div class="col-md-3 col-sm-3">   
					<label for="tipo">Tipo de alojamiento</label>
                    <select name="tipo" id="tipo" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="1">Hotel</option>
                        <option value="2">Casa Rural</option>
						<option value="3">Piso-parcial</option>
						<option value="4">Piso completo</option>
                    </select>					
                    </div>

                    <div class="col-md-3 col-sm-3">  
					
                    </div>
					<div class="clearfix"></div>
					<?php //Empezamos con las caracteristias?>
					
                    <hr>
					<h3>Caracteristicas</h3>
					<div class="col-md-3 col-sm-3">  
					<label for="piscina">Piscina</label>
                    <select name="piscina" id="piscina" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="1">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="wifi">Wi-fi</label>
                    <select name="wifi" id="wifi" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="2">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="spa">Spa</label>
                    <select name="spa" id="spa" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="4">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="desayuno">Desayuno</label>
                    <select name="desayuno" id="desayuno" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="5">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="nhabitacion">Numero de Habitaciones</label>
                    <select name="nhabitacion" id="nhabitacion" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="7">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="cafeteria">Cafeteria</label>
                    <select name="cafeteria" id="cafeteria" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="8">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="discoteca">Discoteca</label>
                    <select name="discoteca" id="discoteca" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="13">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="pista">Pista Deportiva</label>
                    <select name="pista" id="pista" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="14">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
                    <br/>

                </div>
            </div>
        </div>
                            <div id="resultado_busqueda">
                    </div>
        <div class="clearfix"></div>
    </div>
</div><!--/main-->