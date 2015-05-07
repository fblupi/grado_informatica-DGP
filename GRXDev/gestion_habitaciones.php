<div class="container" id="main">
    <div class="row">
        <?php if ((isset($_POST['correo']) || isset($_POST['pass'])) && mysql_num_rows($result) == 0) { ?>
    <div class="col-md-12 col-sm-12">
        <div class="alert alert-info alert-dismissable">Error al iniciar sesi�n.</div>
    </div>
<?php } ?>
<div center-block">
<div class="panel panel-warning">
    <div class="panel-heading"><h4>Añadir habitaciones</h4></div>
    <-- //Se obtendrá por parametro GET el id del alojamiento -->
    <div class="panel-body">
        <form class="form col-md-12" action="script_nueva_habitacion.php?ID_Alojamiento=1" method="post">
            <div class="form-group col-md-3 col-sm-3">
                <label for="precio">Precio</label>
                <input type="text" id="precio" name="add_precio" class="form-control">
            </div>
            <div class="form-group col-md-5 col-sm-5">
                <label for="nombre">Dirección</label>
                <input type="text" id="nombre" name="add_direccion" class="form-control" >
            </div>
            <?php
                include 'conexionBD.php';
                $result=$datos->Query("SELECT * FROM caracteristicas WHERE tipo='1'");
                while($fila=mysql_fetch_array($result)){

                    if($fila['Tipo_check']=='1'){
                        echo '<div class="col-md-2 col-sm-3">';
                        echo '<label for="'.$fila['Descripcion'].'">'.$fila['Descripcion'].'</label>';
                        echo '<input type="checkbox"  name="'.$fila['Descripcion'].'" value="'.$fila['Descripcion'].'" >';
                    }else{
                        echo '<div class="form-group col-md-3 col-sm-3">';
                        echo '<label for="'.$fila['Descripcion'].'">'.$fila['Descripcion'].'</label>';
                        echo '<input type="text" id="'.$fila['Descripcion'].'" name="'.$fila['Descripcion'].'" class="form-control" >';
                    }
					echo '</div>';
                }
            ?>
            <div class="form-group col-md-3 col-sm-3">
                <label for="precio">Habitaciones a añadir: </label>
                <input type="text" id="copias" name="copias" class="form-control">
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <button class="btn btn-primary" type="submit" >Añadir habitacion(es)</button>
            </div>
        </form>
    </div>
</div>
</div> <-- Buscador -->
<div class="col-md-12 col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading"><h4>Buscar Alojamientos</h4></div>
        <div class="panel-body">
            <div class="col-md-3 col-sm-3">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" onkeyup="MostrarConsultalojamiento();">
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="ubicacion">Ubicacion</label>
                <input type="text" id="ubicacion" name="ubicacion" class="form-control" onkeyup="MostrarConsultalojamiento();">
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="precio">Precio</label>
                <input type="text" id="precio" name="precio" class="form-control" onkeyup="MostrarConsultalojamiento();">
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="estrella">Estrellas</label>
                <select name="estrella" id="estrella" class="form-control" onchange="MostrarConsultalojamiento();">
                    <option value="">--</option>
                    <option value="1">1 estrella</option>
                    <option value="2">2 estrellas</option>
                    <option value="3">3 estrellas</option>
                    <option value="4">4 estrellas</option>
                    <option value="5">5 estrellas</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="tipo">Tipo de alojamiento</label>
                <select name="tipo" id="tipo" class="form-control" onchange="MostrarConsultalojamiento();">
                    <option value="">--</option>
                    <option value="1">Hotel</option>
                    <option value="2">Casa Rural</option>
                    <option value="3">Piso-parcial</option>
                    <option value="4">Piso completo</option>
                </select>
            </div>

            <div class="col-md-3 col-sm-3">

            </div>

            <div class="col-md-12 col-sm-12">
                <h3>Caracteristicas de Alojamiento</h3>
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="piscina">Piscina</label>
                <button class="btn btn-primary" id="piscina" value="1" onChange="MostrarConsultalojamiento();" >Ver Mas</button>
                <select name="piscina" id="piscina" class="form-control" onchange="MostrarConsultalojamiento();">
                    <option value="">--</option>
                    <option value="1">Si</option>
                    <option value="">No</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="wifi">Wi-fi</label>
                <select name="wifi" id="wifi" class="form-control" onchange="MostrarConsultalojamiento();">
                    <option value="">--</option>
                    <option value="2">Si</option>
                    <option value="">No</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="spa">Spa</label>
                <select name="spa" id="spa" class="form-control" onchange="MostrarConsultalojamiento();">
                    <option value="">--</option>
                    <option value="4">Si</option>
                    <option value="">No</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="desayuno">Desayuno</label>
                <select name="desayuno" id="desayuno" class="form-control" onchange="MostrarConsultalojamiento();">
                    <option value="">--</option>
                    <option value="5">Si</option>
                    <option value="">No</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="nhabitacion">Numero de Habitaciones</label>
                <select name="nhabitacion" id="nhabitacion" class="form-control" onchange="MostrarConsultalojamiento();">
                    <option value="">--</option>
                    <option value="7">Si</option>
                    <option value="">No</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="cafeteria">Cafeteria</label>
                <select name="cafeteria" id="cafeteria" class="form-control" onchange="MostrarConsultalojamiento();">
                    <option value="">--</option>
                    <option value="8">Si</option>
                    <option value="">No</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="discoteca">Discoteca</label>
                <select name="discoteca" id="discoteca" class="form-control" onchange="MostrarConsultalojamiento();">
                    <option value="">--</option>
                    <option value="13">Si</option>
                    <option value="">No</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-3">
                <label for="pista">Pista Deportiva</label>
                <select name="pista" id="pista" class="form-control" onchange="MostrarConsultalojamiento();">
                    <option value="">--</option>
                    <option value="14">Si</option>
                    <option value="">No</option>
                </select>
            </div>
            <br/><br/>

        </div>
    </div>
</div>
<div id="resultado_busqueda">
</div>
<div class="clearfix"></div>
</div>
</div><!--/main-->