<!DOCTYPE html>
<html lang="es">

<head>
<title>RaspWallet - Cuentas</title>
<?php require_once("../views/partials/head.php")?>

<!-- Datatables CSS-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

<!-- Datatables JS -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" ></script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php require_once("../views/partials/sidebar.php")?>

        <!-- Inicio Contenido -->
        <div id="page-content-wrapper">
            <button type="button" class="btn btn-secondary btn-menusb" id="menu-toggle"><i class="fas fa-bars"></i></button>

            <!-- Inicio Datatable -->
            <button id="btnNew" type="button" class="btn btn-info btn-nuevo" data-toggle="modal" data-target="#modalNewAcc">+</button>
            <h2 class="mx-7 titulo">Cuentas</h2>
            <hr style="width:90%; margin:auto; margin-bottom:20px; margin-top:20px; background-color:black;"/>

            <div class="card" style="padding: 5px 10px 5px; margin: 10px;">
                <table class="table table-bordered mr-4 pr-7" style="width:100%" id="dttable">
                    <thead class="thead-dark bg-raspi">
                        <tr>
                            <th>Cuenta</th>
                            <th>Comentario</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($accounts): foreach($accounts as $row): ?>
                    <tr>
                        <td><?= $row->account?></td>
                        <td><?= $row->description?></td>
                        <td><button type="button" class="btn btn-info btn-modificar" title="Modificar" data-toggle="modal" data-target="#modalModAcc" onclick="cargar_modal(<?=$row->id_acc?>)"><i class="fas fa-edit"></i></button></td>
                    </tr>
                    <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
            <!-- Fin Datatable -->

            <!-- Inicio Modal: Nueva cuenta  -->
            <div id="modalNewAcc" class="modal fade" role="dialog" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Registrar Nueva Cuenta</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form-newAcc">   
                                <div class="form-group">
                                    <label for="nCuenta">Cuenta</label>
                                    <input id="nCuenta" type="text" class="form-control inputuser modal-input" placeholder="2-50 caracteres" name="nCuenta" minlength="2" maxlength="50" required> 
                                </div>
                                <div class="form-group">
                                    <label for="nDesc">Descripcion</label>
                                    <input id="nDesc" type="text" class="form-control inputuser modal-input" placeholder="255 caracteres maximo" name="nDesc" maxlength="255"> 
                                </div>
                                <button id="confirmarNew" type="submit" class="btn btn-confirmar col-md-12">Confirmar</button>
                                <button id="cancelarNew" type="button" class="btn btn-cancelar col-md-12" data-dismiss="modal">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Modal  -->

            <!-- Inicio Modal: Modificar cuenta  -->
            <div id="modalModAcc" class="modal fade" role="dialog" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modificar Cuenta</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form-modAcc">
                                <div class="form-group">
                                    <input id="mId" type="hidden" name="mId"> 
                                </div>
                                <div class="form-group">
                                    <label for="mCuenta">Cuenta</label>
                                    <input id="mCuenta" type="text" class="form-control inputuser modal-input" name="mCuenta" minlength="2" maxlength="50"> 
                                </div>
                                <div class="form-group">
                                    <label for="mDesc">Descripcion</label>
                                    <input id="mDesc" type="text" class="form-control inputuser modal-input" name="mDesc" maxlength="255"> 
                                </div>                                
                                <button id="confirmarMod" type="submit" class="btn btn-confirmar col-md-12">Confirmar</button>
                                <button id="cancelarMod" type="button" class="btn btn-cancelar col-md-12" data-dismiss="modal">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Modal  -->

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

        </div>
        <!-- Fin Contenido -->
    </div>
    
    <!-- Cuentas JS -->
    <script type="text/javascript" src="../../docs/js/alerta.js"></script> 
    <script type="text/javascript" src="../../docs/js/cuentas.js"></script> 

    <!-- Sidebar JS -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    <!-- Datatable Traduccion -->
    <script type="text/javascript" src="../../docs/js/datatableOpt.js"></script> 
</body>

</html>