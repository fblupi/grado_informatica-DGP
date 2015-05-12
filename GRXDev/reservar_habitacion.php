
        <!--main-->
<div class="container" id="main">
    <div class="row">
        <?php
        /**********
         * CAMBIAR POR COMPROBACION DE USUARIO !!
         *********/
        if(false)//Si existe un error de inicio de sesión se muestra el div de error
        {   ?>
        <div class="col-md-12 col-sm-12">
            <div class="alert alert-danger alert-dismissable">Debe iniciar sesión.</div>
        </div> 
        <?php } elseif(!isset($_GET['ID_Habitacion']))
        {?>
            <div class="col-md-12 col-sm-12">
            <div class="alert alert-danger alert-dismissable">No se encuentra la habitación a reservar.</div>
        </div> 
        <?php } elseif(isset($_GET['error_fechas'])){
            // if($_GET['error_fechas']==true){?>
            <div class="col-md-12 col-sm-12">
            <div class="alert alert-danger alert-dismissable">Las fecha de inicio es mayor que la final.</div>
        </div> 
        <?php //}
        } elseif(isset($_GET['error_fechas_ocupadas']))
        {
             //if($_GET['error_fechas_ocupadas']==true){?>
            <div class="col-md-12 col-sm-12">
            <div class="alert alert-danger alert-dismissable">Las fechas están ocupadas, elige otras.</div>
        </div> 
        <?php // }
        } else{?>
        <div class="col-md-12 col-sm-12">
    	<div class="panel panel-default">
           <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4></h4></div>
   			<div class="panel-body">
                            <form class="form col-md-8 center-block" action="script_reservar_habitacion.php?ID_Habitacion=<?php echo $_GET['ID_Habitacion'];?>" method="post">
                                <div class="form-group">
                                    <input type="text" name="reserva_desde" class="form-control" placeholder="Desde (26-01-2015)">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reserva_hasta" class="form-control" placeholder="Hasta (26-01-2015)">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reserva_tarjeta" class="form-control" placeholder="NºTarjeta">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reserva_tipo_tarjeta" class="form-control" placeholder="Tipo de tarjeta">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" >Reservar</button>
                                </div>
                            </form>
			  </div>
         </div>
	</div>
        <div class="clearfix"></div>
	</div>
        <?php } ?>  
</div><!--/main-->
