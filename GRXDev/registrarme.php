        <!--main-->
        <div class="container" id="main">
            <div class="row">
                <?php 
                    if(isset($_GET['error_registro']))//Si existe un error de inicio de sesión se muestra el div de error
                    {
                    if($_GET['error_registro'] == true){ ?>

                    <div class="col-md-12 col-sm-12">
                        <div class="alert alert-danger alert-dismissable">Error al iniciar sesi�n.</div>
                    </div> 

                <?php }} ?>
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>Registrarme</h4></div>
                        <div class="panel-body">
                            <form class="form col-md-8 center-block" id="formularioUsuario" action="script_registrarme_usuario.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="reg_usuario" class="form-control" placeholder="Nombre de usuario*" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_correo" class="form-control" placeholder="Dirección de correo*" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="reg_pass" class="form-control" placeholder="Contraseña*" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_nombre" class="form-control" placeholder="Nombre" >
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_apellidos" class="form-control" placeholder="Apellidos" >
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_fechanac" class="form-control" placeholder="Fecha nac. dd/mm/yyyy" >
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_ubicacion" class="form-control" placeholder="Ubicación" >
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="reg_sexo" value="Hombre" checked>Hombre
                                    <input type="radio" name="reg_sexo" value="Mujer">Mujer
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
                            <form class="form col-md-8 center-block" action="script_registrarme_dueno.php" id="formularioDueno" method="post">
                                <div class="form-group">
                                    <input type="text" name="reg_usuario" class="form-control" placeholder="Nombre de usuario*" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_nombre" class="form-control" placeholder="Nombre*" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_nif" class="form-control" placeholder="NIF o CIF*" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="reg_correo" class="form-control" placeholder="Dirección de correo*" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="reg_pass" class="form-control" placeholder="Contraseña*" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger" >Registrarme como dueño</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div><!--/main-->