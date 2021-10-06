<!DOCTYPE html>
<html lang="es">

<head>
<title>RaspWallet - Histograma</title>
<?php require_once("../views/partials/head.php")?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

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
    <div class="d-flex d-flex-column" id="wrapper">
        <?php require_once("../views/partials/sidebar.php")?>

        <!-- Inicio Contenido -->
        <div id="page-content-wrapper">
            <div class="d-flex">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-secondary btn-menusb" id="menu-toggle"><i class="fas fa-bars"></i></button>
                    </div>
                </div>
                <div class="row">
                    <!--Inicia grafico -->
                    <div id="GraficoDiv" class="col-md-8 col-lg-8 col-xl-8 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Grafico</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" width="600" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <!--Fin grafico -->

                    <!--Inicio formulario de configuracion del grafico -->
                    <div id="DateDiv" class="col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Fechas</h4>
                            </div>
                            <div class="card-body">
                                <form id="form-config">
                                    <div class="form-group">
                                        <input id="mId" type="hidden" name="mId"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="t0">Desde</label>
                                        <input id="t0" type="date" class="form-control inputuser modal-input" name="t0"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="t1">Hasta</label>
                                        <input id="t1" type="date" class="form-control inputuser modal-input" name="t1"> 
                                    </div>                             
                                    <button id="aplicar" type="button" class="btn btn-confirmar col-md-12">Aplicar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Fin formulario-->
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

        </div>
        <!-- Fin Contenido -->
    </div>
    
    <!-- Cuentas JS -->
    <script type="text/javascript" src="../../docs/js/alerta.js"></script> 
    <script type="text/javascript" src="../../docs/js/grafico.js"></script>

    <!-- Grafico -->
    <script>
        var labelsA = [];
        var xVals = [];
        <?php $i=0; foreach($labels as $rowL): ?>
        labelsA.push("<?= $rowL ?>");
        xVals.push(<?= $xVals[$i] ?>);
        <?php $i = $i+1?>
        <?php endforeach ?>
        graficar("myChart",labelsA,xVals);
    </script>

    <!-- Sidebar JS -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        if ($("#wrapper").hasClass("toggled")) {
            $("#GraficoDiv").attr('class','col-md-9 col-lg-9 col-xl-9 col-sm-12 col-xs-12');
            $("#DateDiv").attr('class','col-md-3 col-lg-3 col-xl-3 col-sm-12 col-xs-12');
        } else {
            $("#GraficoDiv").attr('class','col-md-8 col-lg-8 col-xl-8 col-sm-12 col-xs-12');
            $("#DateDiv").attr('class','col-md-4 col-lg-4 col-xl-4 col-sm-12 col-xs-12');
        }
    });
    </script>

    <!-- Datatable Traduccion -->
    <script type="text/javascript" src="../../docs/js/acctable.js"></script>
</body>

</html>