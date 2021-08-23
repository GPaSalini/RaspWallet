<!DOCTYPE html>
<html lang="es">

<head>
<title>RaspWallet - Inicio</title>
<?php require_once("../views/partials/head.php")?>
</head>

<body>
    <div class="d-flex" id="wrapper">
    <?php if(isset($_SESSION["user"])): ?>
        <?php require_once('../views/partials/sidebar.php'); ?>
    <?php else: ?>
        <?php require_once('../views/partials/sideLogin.php'); ?>
    <?php endif; ?>
    </div>

    <!-- Modal de Registro de nuevo Usuario -->
    <div id="modalReg" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Nuevo Usuario</h3>
                </div>
                <div class="modal-body">
                    <form id="form-register">
                        <div>
                            <label for="username">Usuario</label>
                            <input type="text" class="col-md-12" name="username" placeholder="8-50 caracteres" minlength="8" maxlength="50" required/>
                        </div>
                        <br>
                        <div>
                            <label for="pass">Contraseña</label>
                            <input type="password" class="col-md-12" name="pass" placeholder="8-50 caracteres" minlength="8" maxlength="50" required/>
                        </div>
                        <br>
                        <div>
                            <label for="Rpass">Repetir Contraseña</label>
                            <input type="password" class="col-md-12" name="Rpass" placeholder="8-50 caracteres" minlength="8" maxlength="50" required/>
                        </div>
                        <br>
                        <div>
                            <label for="question">Pregunta Secreta</label>
                            <select id="question" class="form-control" name="question" required>
                                <option value="1">Cual es tu color favorito?</option>
                                <option value="2">Cual es tu numero favorito?</option>
                                <option value="3">Cual es tu lugar favorito?</option>
                                <option value="4">Cual es tu palabra favorita?</option>
                                <option value="5">Cual es tu artista favorito?</option>
                                <option value="6">Cual es tu personaje favorito?</option>
                                <option value="7">Cual es tu pelicula favorita?</option>
                                <option value="8">Cual es tu serie favorita?</option>
                                <option value="9">Cual es tu cancion favorita?</option>
                            </select>
                        </div>
                        <br>
                        <div>
                            <label for="answer">Respuesta</label>
                            <input type="text" class="col-md-12" name="answer" placeholder="2-50 caracteres" minlength="2" maxlength="50" required/>
                        </div>
                        <br>
                        <a id="confirmarReg" type="submit" class="btn btn-confirmar col-md-12">Confirmar</a>
                        <a id="cancelar" type="button" data-dismiss="modal" class="btn btn-cancelar col-md-12">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Inicio Modal de alerta-->
    <div class="modal fade" id="modAlert" role="dialog">
        <div class="modal-dialog" style="top:20%">
            <div class="modal-content" style="margin-bottom:0;">
                <div id="alerta" class="modal-body" role="alert" style="position: relative; margin: 8px;">
                    <i style="position: absolute; left: 94%;" class="fas fa-info-circle"></i> 
                    <div id="msnAlert" class="form-group" style="padding-top: 10px; margin: 0;">
                        <!-- Mensaje -->
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal -->

    <!--Inicio Modal de alerta-->
    <div class="modal fade" id="modAlert2" role="dialog">
        <div class="modal-dialog" style="top:20%">
            <div class="modal-content" style="margin-bottom:0;">
                <div id="alerta2" class="modal-body" role="alert" style="position: relative; margin: 8px;">
                    <i style="position: absolute; left: 94%;" class="fas fa-info-circle"></i> 
                    <div id="msnAlert2" class="form-group" style="padding-top: 10px; margin: 0;">
                        <!-- Mensaje -->
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal -->

    <script type="text/javascript" src="../../docs/js/login.js"></script> 
    <script type="text/javascript" src="../../docs/js/registro.js"></script> 
    <script type="text/javascript" src="../../docs/js/alerta.js"></script> 

    <!-- Sidebar JS -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>