<!DOCTYPE html>
<html lang="en">

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
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Cabecera tarjeta</div>
                        <div class="panel-body">Cuerpo</div>
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