<!-- Inicio Sidebar -->
<div class="text-white sidebar-login" id="sidebar-wrapper">
    <div class="sidebar-heading"><img class="centrado" src="../../docs/img/raspberry-icon2.png" width="80" height="80"><h5 class="centrado">RaspWallet</h5></div>
    <hr style="width:90%; margin:auto; background-color:gray;"/>
    <div class="list-group list-group-flush centrado">
        <form id="form-login" class="text-white list-group-item list-group-item-action" action="../controllers/login.php" method="post">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input id="username" type="text" class="form-control inputuser modal-input" name="username" minlength="8" maxlength="50"> 
            </div>
            <div class="form-group" style="margin-bottom:0;">
                <label for="pass">Contraseña</label>
                <input id="pass" type="password" class="form-control inputuser modal-input" name="pass" minlength="8" maxlength="50"> 
            </div>
            <a type="submit" id="confirmar" href="#" class="bg-raspi text-white btn-menu list-group-item list-group-item-action"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
            <a type="submit" data-toggle="modal" data-target="#modalReg" class="bg-raspi text-white btn-menu list-group-item list-group-item-action"><i class="fas fa-user-plus"></i> Nuevo Usuario</a>
        </form>
    </div>
</div>

<!-- Login JS -->
<script type="text/javascript" src="../../docs/js/login.js"></script>
<!-- Fin Sidebar -->