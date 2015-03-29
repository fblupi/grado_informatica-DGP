<div class="container" id="main">
            <div class="row">
                <?php if ((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result) == 0) { ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="alert alert-info alert-dismissable">Error al iniciar sesión.</div>
                    </div>
                <?php } ?>
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Buscar Usuario</div>
                        <div class="panel-body">
							<label for="nick">Nick</label>
							<input type="text" id="nick" name="nick" onkeyup="MostrarConsulta();">
							<label for="email">Email</label>
							<input type="text" id="email" name="email" onkeyup="MostrarConsulta();">
							<label for="nombre">Nombre</label>
							<input type="text" id="nombre" name="nombre" onkeyup="MostrarConsulta();">
							<label for="apellidos">apellidos</label>
							<input type="text" id="apellidos" name="apellidos" onkeyup="MostrarConsulta();"><br><br>
							<label for="fecha">Fecha</label>
							<input type="text" id="fecha" name="fecha" onkeyup="MostrarConsulta();">
							<label for="ubicacion">Ubicacion</label>
							<input type="text" id="ubicacion" name="ubicacion" onkeyup="MostrarConsulta();">
							<label for="sexo">Sexo</label>
							<select name="sexo" id="sexo" onchange="MostrarConsulta();">
								<option value="">--</option>
								<option value="hombre">Hombre</option>
								<option value="mujer">Mujer</option>
							</select>
							<hr>
							<div id="resultado_busqueda">
							</div>
						</div>
                    </div>
                </div>
                <div class="clearfix"></div>
				    </div>
</div><!--/main-->