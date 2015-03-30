
        <!--main-->
<div class="container" id="main">
    <div class="row">
        <?php 
        if(isset($_GET['error_sesion']))//Si existe un error de inicio de sesión se muestra el div de error
        {
        if($_GET['error_sesion'] == true){ ?>
        
        <div class="col-md-12 col-sm-12">
            <div class="alert alert-danger alert-dismissable">Error al iniciar sesi�n.</div>
        </div> 
        
        <?php }} ?>
        
            <div class="col-md-12 col-sm-12">
                <div class="panel panel-default">
                <div class="panel-heading">Cabecera tarjeta</div>
                <div class="panel-body">Cuerpo</div>
                </div>
            </div>
        <div class="clearfix"></div>
	</div>
</div><!--/main-->