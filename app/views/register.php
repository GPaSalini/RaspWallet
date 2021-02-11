<!DOCTYPE html>
<html lang="es">

<head>
<?php require_once("../views/partials/head.php")?>
</head>

<body style="background-color:#2c1608;">
    <!-- Inicio Formulario de registro -->
    <br>
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header">
                <h1> Registro </h1>
            </div>
            <div class="card-body">
                <form id="form-register" action="../controllers/signup.php" method="POST">
                    <div>
                        <label for="username">Usuario</label>
                        <input type="username" class="col-md-12" name="username" placeholder="8-50 caracteres" minlength="8" maxlength="50" required/>
                    </div>
                    <br>
                    <div>
                        <label for="pass">Contraseña</label>
                        <input type="pass" class="col-md-12" name="pass" placeholder="8-50 caracteres" minlength="8" maxlength="50" required/>
                    </div>
                    <br>
                    <div>
                        <label for="Rpass">Repetir Contraseña</label>
                        <input type="Rpass" class="col-md-12" name="Rpass" placeholder="8-50 caracteres" minlength="8" maxlength="50" required/>
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
                        <input type="answer" class="col-md-12" name="answer" placeholder="2-50 caracteres" minlength="2" maxlength="50" required/>
                    </div>
                    <br>
                    <button id="confirmar" type="submit" class="btn btn-primary col-md-10">Confirmar</button>
                </form>
            </div>
            <p class="offset-md-3"> Ya tienes cuenta? <a href="../views/index.php">Conectarse</a></p>
        </div>
    </div>
    <br>
    <!-- Fin Formulario -->

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

    <!-- Fontawesome JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <!-- Registro JS -->
    <script type="text/javascript" src="../../docs/js/registro.js"></script>
</body>

</html>