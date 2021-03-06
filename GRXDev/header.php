<?php 

if(!isset($_COOKIE['sesion_iniciada']))
{
    setcookie('sesion_iniciada',false);
    $_COOKIE['sesion_iniciada']=false;
}
if($_COOKIE['sesion_iniciada'] == false)
{
    $_COOKIE['nombre_perfil']='Perfil';
    $_COOKIE['tipo_usuario']=0;
}
?>
<!DOCTYPE html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>GRXDev</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
				<style>
body{
        <?php if($_COOKIE['color'] == 0 || (!isset($_COOKIE['color'])))
        {
        echo "filter: grayscale(0%); -webkit-filter: grayscale(0%); -moz-filter: grayscale(0%); -ms-filter: grayscale(0%); -o-filter: grayscale(0%);";
        }
        else
        {
        echo "filter: grayscale(100%); -webkit-filter: grayscale(100%); -moz-filter: grayscale(100%); -ms-filter: grayscale(100%); -o-filter: grayscale(100%);";
        } ?>
}
</style>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">
		<!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
		<script type="text/javascript" src="js/ajax.js"></script>



    </head>
<nav class="navbar navbar-fixed-top header">
    <div class="col-md-12">
        <div class="navbar-header">

            <a href="index.php"><img src="images/Acercando GRANADA [SMALL].png" width="150" height="50" alt="GRXDev"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
                <i class="glyphicon glyphicon-search"></i>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse1">
            <form class="navbar-form pull-right">
                <div class="input-group" style="max-width:470px;">
                    <input type="image" src="images/accessibility.png" onclick="cambiarColores()" alt="Submit" width="32" height="32">
                </div>
            </form>
        </div>	
    </div>	
</nav>
<div class="navbar navbar-default" id="subnav">
    <div class="col-md-12">
        <div class="navbar-header">

            <?php if ($_COOKIE['sesion_iniciada'] == true) { ?>
                <a href="#" style="margin-left:15px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Inicio <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
                <ul class="nav dropdown-menu">
                    <li><a href="index.php?cat=perfil"><i class="glyphicon glyphicon-user" style="color:#1111dd;"></i> <?php echo $_COOKIE['nombre_perfil']; ?></a></li>
                    <li class="nav-divider"></li>
                    <li><a href="#"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> Configuración</a></li>
                    <?php if ($_COOKIE['tipo_usuario'] == 0) { ?>
                        <li><a href="index.php?cat=mis_reservas"><i class="glyphicon glyphicon-eye-open" style="color:#888fff;"></i> Mis reservas</a></li>
                    <?php } ?>
                    <?php if ($_COOKIE['tipo_usuario'] == 1) { ?>
                    <li><a href="index.php?cat=buscador"><i class="glyphicon glyphicon-eye-open" style="color:#888fff;"></i> Gestión de usuarios</a></li>
					<li><a href="index.php?cat=buscadord"><i class="glyphicon glyphicon-eye-open" style="color:#888fff;"></i> Gestión de Dueños</a></li>
                    <?php } ?>
					<?php if ($_COOKIE['tipo_usuario'] == 2 || $_COOKIE['tipo_usuario'] == 1 ) { ?>
                    <li><a href="index.php?cat=novali"><i class="glyphicon glyphicon-eye-open" style="color:#888fff;"></i> Informe: No validados</a></li><li><a href="index.php?cat=vali">
					<i class="glyphicon glyphicon-eye-open" style="color:#888fff;"></i> Informe: Validados</a></li>
                    <?php } ?>
					 <?php if ($_COOKIE['tipo_usuario'] == 1 || $_COOKIE['tipo_usuario'] == 5) { ?>
                        <li><a href="index.php?cat=gestion_alojamientos"><i class="glyphicon glyphicon-globe" style="color:#888fff;"></i> Gestión de alojamientos</a></li>
                    <?php } ?>
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
                <li class="active"><a href="index.php">Contenido</a></li>
				<li ><a href="index.php?cat=buscador_alo">Buscar Alojamientos</a></li>
                <?php if ($_COOKIE['sesion_iniciada'] == false) { ?><li><a href="#loginModal" role="button" data-toggle="modal">Iniciar sesión</a></li><?php } ?>
                <li><a href="#aboutModal" role="button" data-toggle="modal">¿Quiénes somos?</a></li>
            </ul>
        </div>	
    </div>	
</div>

<script>
function cambiarColores(){
	 
	if(<?php if (!isset($_COOKIE['color']) || $_COOKIE['color']==0) echo 0; else echo 1; ?>==0)
	{
		document.cookie= "color=1";
	}
	else
	{
		document.cookie= "color=0";
	}
	
	var direccion = window.location.href;
	window.location.assign(direccion);
}
</script>


