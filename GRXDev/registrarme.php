<!DOCTYPE html>
<html lang="en">
    <?php
            include "BD.php";
            $datos = new BD("localhost", "GRXDev", "1234","GRXDev");
            $GLOBALS['sesion_iniciada'] = false;
            $GLOBALS['error_registro'] = false;
            $GLOBALS['nombre_perfil'] = 'Perfil';
            $GLOBALS['cadena'] = 'Sin cadena';
            if(isset($_POST['correo']) && isset($_POST['pass']))
            {
                $nombreusuario = htmlspecialchars($_POST['correo']);
                $contrasena = htmlspecialchars($_POST['pass']);
                $result = $datos->Query("select Nombre_usuario from Usuarios where Direccion_correo='$nombreusuario' AND Contrasena='$contrasena'");
                if (mysql_num_rows($result)>0) {
                    $GLOBALS['nombre_perfil'] = mysql_result($result,0);
                    $GLOBALS['sesion_iniciada'] = true;
                } 
            }
    ?>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>GRXDev</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
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
          <?php if($GLOBALS['sesion_iniciada']==true){ ?>
          <a href="#" style="margin-left:15px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Inicio <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
          <ul class="nav dropdown-menu">
              <li><a href="#"><i class="glyphicon glyphicon-user" style="color:#1111dd;"></i> <?php echo $GLOBALS['nombre_perfil']; ?></a></li>
              <li class="nav-divider"></li>
              <li><a href="#"><i class="glyphicon glyphicon-cog" style="color:#dd1111;"></i> Configuración</a></li>
              <li><a href="cerrar_sesion.php"><i class="glyphicon glyphicon-eject" style="color:#11dd11;"></i> Cerrar sesión</a></li>
              <li><a href="#"><i class="glyphicon glyphicon-plus"></i> Más...</a></li>
          </ul>
          <?php }?>
          
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
             <?php if($GLOBALS['sesion_iniciada']==false){ ?><li><a href="#loginModal" role="button" data-toggle="modal">Iniciar sesión</a></li><?php } ?>
             <li><a href="#aboutModal" role="button" data-toggle="modal">¿Quiénes somos?</a></li>
           </ul>
        </div>	
     </div>	
</div>

<!--main-->
<div class="container" id="main">
  <div class="row">
      <?php if((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result)==0) { ?>
      <div class="col-md-12 col-sm-12">
          <div class="alert alert-info alert-dismissable">Error al iniciar sesión.</div>
      </div>
      <?php } ?>
      <?php if($GLOBALS['error_registro']==true) { ?>
      <div class="col-md-12 col-sm-12">
          <div class="alert alert-info alert-dismissable">Error al registrarse, compruebe los campos. <?php echo $GLOBALS['cadena']; ?></div>
      </div>
      <?php } ?>
      <div class="col-md-6 col-sm-6">
          <div class="panel panel-default">
              <div class="panel-heading"><h4>Registrarme</h4></div>
              <div class="panel-body">
                <form class="form col-md-8 center-block" action="registrarme_usuario.php" method="post">
                    <div class="form-group">
                        <input type="text" name="reg_usuario" class="form-control" placeholder="Nombre de usuario">
                    </div>
                    <div class="form-group">
                        <input type="text" name="reg_correo" class="form-control" placeholder="Dirección de correo">
                    </div>
                    <div class="form-group">
                        <input type="password" name="reg_pass" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" >Registrarme</button>
                    </div>
                </form>
              </div>
          </div>
    </div>
      <div class="col-md-6 col-sm-6">
          <div class="panel panel-default">
              <div class="panel-heading"><h4>Registrarme como dueño</h4></div>
              <div class="panel-body">
                  <form class="form col-md-8 center-block" method="post">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="dni" class="form-control" placeholder="DNI o CIF">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger" >Registrarme como dueño</button>
                    </div>
                </form>
              </div>
          </div>
    </div>
    <div class="clearfix"></div>
      
    <hr>
    <div class="col-md-12 text-center"><p><a href=#>Autores:</a></p></div>
    <hr>
    
  </div>
</div><!--/main-->

<!--login modal-->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><img src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"><br>Iniciar sesión</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post">
            <div class="form-group">
              <input type="text" name="correo" class="form-control input-lg" placeholder="Dirección de correo">
            </div>
            <div class="form-group">
              <input type="password" name="pass" class="form-control input-lg" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" >Iniciar sesión</button>
                
              <span class="pull-right"><a href="#">Registrarme</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
      </div>
  </div>
  </div>
</div>


<!--about modal-->
<div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center">¿Quiénes somos?</h2>
      </div>
      <div class="modal-body">
          <div class="col-md-12 text-center">
            <a href="">blablablabla</a>
            <br><br>
            <a href="https://github.com/fblupi/grado_informatica-DGP">GitHub</a>
          </div>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">OK</button>
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>