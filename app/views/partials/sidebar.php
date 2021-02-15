<?php if(isset($_SESSION["user"])): ?>
<!-- Inicio Sidebar -->
<div class="bg-dark text-white" id="sidebar-wrapper">
    <div class="sidebar-heading"><img class="centrado" src="../../docs/img/raspberry-icon2.png" width="80" height="80"><h5 class="centrado">RaspWallet</h5></div>
    <hr style="width:90%; margin:auto; background-color: black;"/>
    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-user-alt"></i> Perfil</a>
        <a href="./ctrlCuentas.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-address-book"></i> Cuentas</a>
        <a href="./ctrlTransacciones.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-exchange-alt"></i> Transacciones</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-chart-area"></i> Histograma</a>
        <a href="./logout.php" class="list-group-item list-group-item-action bg-dark text-white"><i class="fas fa-sign-out-alt"></i> Salir</a>
    </div>
</div>
<!-- Fin Sidebar -->
<?php else: ?>
<!-- Inicio Sidebar -->
<div class="bg-dark text-white sidebar-login" id="sidebar-wrapper">
    <div class="sidebar-heading"><img class="centrado" src="../../docs/img/raspberry-icon2.png" width="80" height="80"><h5 class="centrado">RaspWallet</h5></div>
    <hr style="width:90%; margin:auto; background-color: black;"/>
    <div class="list-group list-group-flush centrado">
        <form id="form-login" class="bg-dark text-white list-group-item list-group-item-action" action="../controllers/login.php" method="post">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input id="username" type="text" class="form-control inputuser modal-input" name="username" minlength="8" maxlength="50"> 
            </div>
            <div class="form-group" style="margin-bottom:0;">
                <label for="pass">Contraseña</label>
                <input id="pass" type="password" class="form-control inputuser modal-input" name="pass" minlength="8" maxlength="50"> 
            </div>
        </form>
        <a id="confirmar" href="#" class="bg-dark text-white list-group-item list-group-item-action"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
        <a href="../views/register.php" class="bg-dark text-white list-group-item list-group-item-action"><i class="fas fa-user-plus"></i> Nuevo Usuario</a>
    </div>
</div>
<!-- Fin Sidebar -->
<?php endif; ?>