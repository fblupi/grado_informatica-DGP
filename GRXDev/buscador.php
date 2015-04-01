<div class="container" id="main">
    <div class="row">
        <?php if ((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result) == 0) { ?>
            <div class="col-md-12 col-sm-12">
                <div class="alert alert-info alert-dismissable">Error al iniciar sesi�n.</div>
            </div>
        <?php } ?>
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4>Buscar Usuario</h4></div>
                <div class="panel-body">
                    <div class="col-md-3 col-sm-3">    
                    <label for="nick">Nombre de usuario</label>
                    <input type="text" id="nick" name="nick" class="form-control" onkeyup="MostrarConsulta();">
                    </div>
                    <div class="col-md-3 col-sm-3">  
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" onkeyup="MostrarConsulta();">
                    </div>
                    <div class="col-md-3 col-sm-3">  
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" onkeyup="MostrarConsulta();">
                    </div>
                    <div class="col-md-3 col-sm-3">  
                    <label for="apellidos">apellidos</label>
                    <input type="text" id="apellidos" name="apellidos" class="form-control" onkeyup="MostrarConsulta();"><br><br>
                    </div>
                    <div class="col-md-3 col-sm-3">     
                    <label for="fecha">Fecha</label>
                    <input type="text" id="fecha" name="fecha" class="form-control" onkeyup="MostrarConsulta();">
                    </div>
                    <div class="col-md-3 col-sm-3">   
                    <label for="ubicacion">Ubicacion</label>
                    <input type="text" id="ubicacion" name="ubicacion" class="form-control" onkeyup="MostrarConsulta();">
                    </div>
                    <div class="col-md-3 col-sm-3">  
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control" onchange="MostrarConsulta();">
                        <option value="">--</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                    </select>
                    </div>
                    <hr>
                    <br/>

                </div>
            </div>
        </div>
                            <div id="resultado_busqueda">
                    </div>
        <div class="clearfix"></div>
    </div>
</div><!--/main-->