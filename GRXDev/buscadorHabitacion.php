<div class="container" id="main">
    <div class="row">
        <?php if ((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result) == 0) { ?>
            <div class="col-md-12 col-sm-12">
                <div class="alert alert-info alert-dismissable">Error al iniciar sesi�n.</div>
            </div>
        <?php } ?>
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4>Buscar Habitaciones</h4></div>
                <div class="panel-body">
					<div class="col-md-3 col-sm-3">  
					<label for="wifi">Wi-fi</label>
                    <select name="wifi" id="wifi" class="form-control" onchange="MostrarConsultahabitacion();">
                        <option value="">--</option>
                        <option value="3">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="ncamas">Numero de camas</label>
                    <select name="ncamas" id="ncamas" class="form-control" onchange="MostrarConsultahabitacion();">
                        <option value="">--</option>
                        <option value="6">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="bano">Baño</label>
                    <select name="bano" id="bano" class="form-control" onchange="MostrarConsultahabitacion();">
                        <option value="">--</option>
                        <option value="9">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="tele">Television</label>
                    <select name="tele" id="tele" class="form-control" onchange="MostrarConsultahabitacion();">
                        <option value="">--</option>
                        <option value="10">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="caja">Caja Fuerte</label>
                    <select name="caja" id="caja" class="form-control" onchange="MostrarConsultahabitacion();">
                        <option value="">--</option>
                        <option value="11">Si</option>
                        <option value="">No</option>
                    </select>
					</div>
					<div class="col-md-3 col-sm-3">  
					<label for="armario">Armario</label>
                    <select name="armario" id="armario" class="form-control" onchange="MostrarConsultahabitacion();">
                        <option value="">--</option>
                        <option value="12">Si</option>
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