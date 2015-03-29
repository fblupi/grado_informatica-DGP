<!DOCTYPE html>
<html lang="en">
    <?php
    include "BD.php";
    $datos = new BD("localhost", "GRXDev", "1234", "GRXDev");
    $GLOBALS['sesion_iniciada'] = false;
    $GLOBALS['error_registro'] = false;
    $GLOBALS['nombre_perfil'] = 'Perfil';
    $GLOBALS['cadena'] = 'Sin cadena';
    if (isset($_POST['correo']) && isset($_POST['pass'])) {
        $nombreusuario = htmlspecialchars($_POST['correo']);
        $contrasena = htmlspecialchars($_POST['pass']);
        $result = $datos->Query("select Nombre_usuario from Usuarios where Direccion_correo='$nombreusuario' AND Contrasena='$contrasena'");
        if (mysql_num_rows($result) > 0) {
            $GLOBALS['nombre_perfil'] = mysql_result($result, 0);
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
        <?php 
        //Incluimos el header que contiene el menu de navegación
        include 'header.php'; 
        ?>

        <!--main-->
        <div class="container" id="main">
            <div class="row">
                <?php if ((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result) == 0) { ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="alert alert-info alert-dismissable">Error al iniciar sesión.</div>
                    </div>
                <?php } ?>
                <?php if ($GLOBALS['error_registro'] == true) { ?>
                    <div class="col-md-12 col-sm-12">
                        <div class="alert alert-info alert-dismissable">Error al registrarse, compruebe los campos. <?php echo $GLOBALS['cadena']; ?></div>
                    </div>
                <?php } ?>
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>Registrarme</h4></div>
                        <div class="panel-body">
                            <form class="form col-md-8 center-block" action="script_registrarme_usuario.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="reg_usuario" class="form-control" placeholder="Nombre de usuario*">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_correo" class="form-control" placeholder="Dirección de correo*">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="reg_pass" class="form-control" placeholder="Contraseña*">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_nombre" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_apellidos" class="form-control" placeholder="Apellidos">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_fechanac" class="form-control" placeholder="Fecha nac. dd/mm/yyyy">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_ubicacion" class="form-control" placeholder="Ubicación">
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="reg_sexo" value="hombre" checked>Hombre
                                    <input type="radio" name="reg_sexo" value="mujer">Mujer
                                </div>
                                </br>
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

                <?php 
                //Incluimos footer
                include 'footer.php'; 
                ?>  
            </div>
        </div><!--/main-->
        <?php
        //Incluimos las ventanas modales de inicio de sesión y quienes somos
        include 'modales.php'; 
        ?>
        <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>