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
					
					<div class="col-md-12 col-sm-12">  
					<h4>Caracteristicas de Alojamiento</h4>
					</div>
					<div class="col-md-1 col-sm-3">  
					<label for="piscina">Piscina</label>
					<input type="checkbox" id="piscina" class="formulario" name="piscina" onClick="MostrarConsultalojamiento();">

					</div>
					<div class="col-md-1 col-sm-3">  
					<label for="wifi">Wi-fi</label>
					<input type="checkbox" id="wifi" name="wifi" onClick="MostrarConsultalojamiento();">
					</div>
					<div class="col-md-1 col-sm-3">
					<label for="spa">Spa</label>
					<input type="checkbox" id="spa" name="spa" onClick="MostrarConsultalojamiento();">
					</div>
					<div class="col-md-2 col-sm-3">  
					<label for="desayuno">Desayuno</label>
					<input type="checkbox" id="desayuno" class="formulario" name="desayuno" onClick="MostrarConsultalojamiento();">
					</div>
					<div class="col-md-2 col-sm-3">  
					<label for="cafeteria">Cafeteria</label>
					<input type="checkbox" id="cafeteria" class="formulario" name="cafeteria" onClick="MostrarConsultalojamiento();">
					</div>
					<div class="col-md-2 col-sm-3">  
					<label for="discoteca">Discoteca</label>
					<input type="checkbox" id="discoteca" class="formulario" name="discoteca" onClick="MostrarConsultalojamiento();">
					</div>
					<div class="col-md-2 col-sm-3">  
					<label for="pista">Pista Deportiva</label>
					<input type="checkbox" id="pista" class="formulario" name="pista" onClick="MostrarConsultalojamiento();">
					</div>
					<div class="col-md-2 col-sm-2">  
					<label for="nhabitacion">Numero de Habitaciones</label>
					<input type="text" id="nhabitacion" name="nhabitacion" class="form-control" onkeyup="MostrarConsultalojamiento();">
					</div>
                    <br/><br/>
					<!-- Caracteristicas de habitacion-->
					<div class="col-md-12 col-sm-12">  
					<h4>Caracteristicas de habitacion</h4>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="wifih">Wi-fi</label>
                    <select name="wifih" id="wifih" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="3">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="ncamas">Numero de camas</label>
                    <select name="ncamas" id="ncamas" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="6">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="bano">Baño</label>
                    <select name="bano" id="bano" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="9">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="tele">Television</label>
                    <select name="tele" id="tele" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="10">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="caja">Caja Fuerte</label>
                    <select name="caja" id="caja" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="11">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="armario">Armario</label>
                    <select name="armario" id="armario" class="form-control" onchange="MostrarConsultalojamiento();">
                        <option value="">--</option>
                        <option value="12">Si</option>
                        <option value="">No</option>
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