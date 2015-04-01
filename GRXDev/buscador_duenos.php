<div class="container" id="main">
    <div class="row">
        <?php if ((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result) == 0) { ?>
            <div class="col-md-12 col-sm-12">
                <div class="alert alert-info alert-dismissable">Error al iniciar sesi�n.</div>
            </div>
        <?php } ?>
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4>Buscar Dueño</h4></div>
                <div class="panel-body">
				    <div class="col-md-3 col-sm-3">  
						<label for="nif">NIF</label>
						<input type="text" id="nif" name="nif" class="form-control" onkeyup="MostrarConsultadueno();">
                    </div>
                    <div class="col-md-3 col-sm-3">    
                    <label for="nick">Nombre de Usuario</label>
                    <input type="text" id="nick" name="nick" class="form-control" onkeyup="MostrarConsultadueno();">
                    </div>
                    <div class="col-md-3 col-sm-3">  
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" onkeyup="MostrarConsultadueno();">
                    </div>
                    <div class="col-md-3 col-sm-3">  
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" onkeyup="MostrarConsultadueno();">
                    </div>
                    <div class="col-md-3 col-sm-3">  
                    <label for="validado">Validado</label>
                    <select name="validado" id="validado" class="form-control" onchange="MostrarConsultadueno();">
                        <option value="">--</option>
                        <option value="si">Validado</option>
                        <option value="no">No Validado</option>
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