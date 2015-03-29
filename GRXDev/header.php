<nav class="navbar navbar-fixed-top header">
    <div class="col-md-12">
        <div class="navbar-header">

            <a href="index.php"><img src="images/GRX-DEV.gif" width="150" height="50" alt="GRXDev"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
                <i class="glyphicon glyphicon-search"></i>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse1">
            <form class="navbar-form pull-left">
                <div class="input-group" style="max-width:470px;">
                    <input type="text" class="form-control" placeholder="Buscar" name="srch-term" id="srch-term">
                    <div class="input-group-btn">
                        <button class="btn btn-default btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>	
    </div>	
</nav>
<div class="navbar navbar-default" id="subnav">
    <div class="col-md-12">
        <div class="navbar-header">

            <?php if ($GLOBALS['sesion_iniciada'] == true) { ?>
                <a href="#" style="margin-left:15px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Inicio <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
                <ul class="nav dropdown-menu">
                    <li><a href="#"><i class="glyphicon glyphicon-user" style="color:#1111dd;"></i> <?php echo $GLOBALS['nombre_perfil']; ?></a></li>
                    <li class="nav-divider"></li>
                    <li><a href="#"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> Configuración</a></li>
                    <li><a href="script_cerrar_sesion.php"><i class="glyphicon glyphicon-eject" style="color:#11dd11;"></i> Cerrar sesión</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-plus"></i> Más...</a></li>
                </ul>
            <?php } ?>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse2">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Contenido</a></li>
                <?php if ($GLOBALS['sesion_iniciada'] == false) { ?><li><a href="#loginModal" role="button" data-toggle="modal">Iniciar sesión</a></li><?php } ?>
                <li><a href="#aboutModal" role="button" data-toggle="modal">¿Quiénes somos?</a></li>
            </ul>
        </div>	
    </div>	
</div>
