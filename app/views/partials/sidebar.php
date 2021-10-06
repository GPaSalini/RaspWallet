<!-- Inicio menu lateral -->
<nav class="navbar justify-content-center bg-raspi text-white" id="sidebar-wrapper">
<div class="sidebar-heading"><img class="centrado" src="../../docs/img/raspberry-icon2.png" width="80" height="80"><h5 class="centrado">RaspWallet</h5></div>
<hr style="width:90%; margin:auto; background-color:gray;"/>
<div class="list-group list-group-flush">
    <a href="./ctrlResumen.php" class="<?php if($var_menu==1) {echo('bg-sel');} else {echo('btn-menu');} ?> text-white list-group-item list-group-item-action"><i class="fas fa-user-alt"></i> Resumen</a>
    <a href="./ctrlCuentas.php" class="<?php if($var_menu==2) {echo('bg-sel');} else {echo('btn-menu');} ?> text-white list-group-item list-group-item-action"><i class="fas fa-address-book"></i> Cuentas</a>
    <a href="./ctrlTransacciones.php" class="<?php if($var_menu==3) {echo('bg-sel');} else {echo('btn-menu');} ?> text-white list-group-item list-group-item-action"><i class="fas fa-exchange-alt"></i> Transacciones</a>
    <a href="./ctrlGrafico.php" class="<?php if($var_menu==4) {echo('bg-sel');} else {echo('btn-menu');} ?> text-white list-group-item list-group-item-action"><i class="fas fa-chart-area"></i> Histograma</a>
    <a href="./logout.php" class="btn-menu text-white list-group-item list-group-item-action"><i class="fas fa-sign-out-alt"></i> Salir</a>
</div>
</nav>
<!-- Fin Menu lateral -->