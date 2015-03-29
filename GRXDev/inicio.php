
        <!--main-->
<div class="container" id="main">
    <div class="row">
        <?php if ((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result) == 0) { ?>
            <div class="col-md-12 col-sm-12">
            <div class="alert alert-info alert-dismissable">Error al iniciar sesión.</div>
            </div>
        <?php } ?>
            <div class="col-md-12 col-sm-12">
                <div class="panel panel-default">
                <div class="panel-heading">Cabecera tarjeta</div>
                <div class="panel-body">Cuerpo</div>
            </div>
        </div>
        <div class="clearfix"></div>
	</div>
</div><!--/main-->