<div class="container" id="main">
    <div class="row">
        <?php if ((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result) == 0) { ?>
            <div class="col-md-12 col-sm-12">
                <div class="alert alert-info alert-dismissable">Error al iniciar sesi�n.</div>
            </div>
        <?php } ?>
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-warning">
                <div class="panel-heading"><h4>Buscar de Informes</h4></div>
                <div class="panel-body">
                    <div class="col-md-3 col-sm-3">  
                    <label for="tipo">Tipo de Informe</label>
                    <select name="tipo" id="tipo" class="form-control" onchange="MostrarConsultaInforme();">
                        <option value="">--</option>
                        <option value="1">A Validar</option>
                        <option value="2">Por pedir</option>
						<option value="3">Pedidos por otros</option>
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