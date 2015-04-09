<!--login modal-->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center"><img src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"><br>Iniciar sesión</h2>
            </div>
            <div class="modal-body">
                <form class="form col-md-12 center-block" action="script_iniciar_sesion.php" method="post">
                    <div class="form-group">
                        <input type="text" name="correo" class="form-control input-lg" placeholder="Dirección de correo">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control input-lg" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" >Iniciar sesión</button>

                        <span class="pull-right"><a href="index.php?cat=registrarme">Registrarme</a></span>
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
                    <a href="">Acercando Granada</a>
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

