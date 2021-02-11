<!DOCTYPE html>
<html lang="es">

<head>
<?php require_once("../views/partials/head.php")?>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php require_once("../views/partials/sidebar.php")?>

        <!-- Inicio Contenido -->
        <div id="page-content-wrapper">
            <button class="btn btn-secondary btn-menusb" id="menu-toggle"><i class="fas fa-bars"></i></button>

            <!-- Inicio Datatable -->
            <h2 class="mx-7 titulo">Transacciones</h2>
            <button id="btnNew" type="button" class="btn btn-info btn-nuevo" data-toggle="modal" data-target="#modalNewTran">+</button>
            <hr style="width:90%; margin: auto; margin-bottom: 20px; background-color: black;"/>

            <div class="card" style="padding: 5px 10px 5px; margin: 10px;">
                <table class="table table-bordered mr-4 pr-7" id="transactionstable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Cuenta</th>
                            <th>Monto</th>
                            <th>Fecha</th>
                            <th>Descripcion</th>
                            <th>Modificar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($transactions): foreach($transactions as $row): ?>
                    <tr>
                        <td><?= $row->account?></td>
                        <td><?= $row->quantity?></td>
                        <td><?= $row->datestamp?></td>
                        <td><?= $row->description?></td>
                        <td><button type="button" class="btn btn-info btn-modificar" data-toggle="modal" data-target="#modalModTran" onclick="cargar_modal(<?=$row->id_trs?>)">Modificar</button></td>
                    </tr>
                    <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
            <!-- Fin Datatable -->

            <!-- Inicio Modal: Nueva transaccion  -->
            <div id="modalNewTran" class="modal fade" role="dialog" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Registrar Nueva Transaccion</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form-newTran">   
                                <div class="form-group">
                                    <label for="nCuenta">Cuenta</label>
                                    <select id="nCuenta" class="form-control" name="nCuenta" required>
                                        <?php if($accounts): foreach($accounts as $row): ?>
                                        <option value=<?=$row->id_acc ?> ><?=$row->account ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nQn">Monto</label>
                                    <input id="nQn" type="number" class="form-control inputuser modal-input" name="nQn" required> 
                                </div>
                                <div class="form-group">
                                    <label for="nDate">Fecha</label>
                                    <input id="nDate" type="datetime-local" class="form-control inputuser modal-input" name="nDate" required> 
                                </div>
                                <div class="form-group">
                                    <label for="nDesc">Descripcion</label>
                                    <input id="nDesc" type="text" class="form-control inputuser modal-input" name="nDesc" maxlength="255"> 
                                </div>
                                <button id="cancelarNew" type="button" class="btn btn-default btn-cancelar" data-dismiss="modal">Cancelar</button>
                                <button id="confirmarNew" type="submit" class="btn btn-default btn-confirmar">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Modal  -->

            <!-- Inicio Modal: Modificar transaccion  -->
            <div id="modalModTran" class="modal fade" role="dialog" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modificar Transaccion</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form-modTran">
                                <div class="form-group">
                                    <input id="mId" type="hidden" name="mId"> 
                                </div>
                                <div class="form-group">
                                    <label for="mCuenta">Cuenta</label>
                                    <select id="mCuenta" class="form-control" name="mCuenta" required>
                                        <?php if($accounts): foreach($accounts as $row): ?>
                                        <option value=<?=$row->id_acc ?> ><?=$row->account ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="mQn">Monto</label>
                                    <input id="mQn" type="number" class="form-control inputuser modal-input" name="mQn" required> 
                                </div>
                                <div class="form-group">
                                    <label for="mDate">Fecha</label>
                                    <input id="mDate" type="datetime-local" class="form-control inputuser modal-input" name="mDate" required> 
                                </div>
                                <div class="form-group">
                                    <label for="mDesc">Descripcion</label>
                                    <input id="mDesc" type="text" class="form-control inputuser modal-input" name="mDesc" maxlength="255"> 
                                </div>
                                <button id="cancelarMod" type="button" class="btn btn-default btn-cancelar" data-dismiss="modal">Cancelar</button>
                                <button id="confirmarMod" type="submit" class="btn btn-default btn-confirmar">Confirmar</button>
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

    <!-- Fontawesome JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
    <!-- Datatables JS -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    
    <!-- Transacciones JS -->
    <script type="text/javascript" src="../../docs/js/transacciones.js"></script> 

    <!-- Sidebar JS -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

    <!-- Datatable Traduccion -->
    <script>
        $('#transactionstable').DataTable({
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":	   "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:&nbsp;&nbsp;",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
                },
                "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    </script>
</body>

</html>