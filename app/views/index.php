<!DOCTYPE html>
<html lang="es">

<head>
<?php require_once("../views/partials/head.php")?>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php require_once("../views/partials/sidebar.php")?>
        <div id="page-content-wrapper">
            <button class="btn btn-secondary btn-menusb" id="menu-toggle"><i class="fas fa-bars"></i></button>
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

    <!-- Fontawesome JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <!-- Login JS -->
    <script type="text/javascript" src="../../docs/js/login.js"></script>

    <!-- Sidebar JS -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>