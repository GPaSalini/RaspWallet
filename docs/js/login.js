$(document).ready(function(){
    $("form").submit(function(e) {
      e.preventDefault()
    })

    $("#confirmar").click(function(){
        if (document.forms["form-login"]["username"].value=="" || document.forms["form-login"]["pass"].value=="") {
            document.getElementById("msnAlert2").innerHTML = "Complete todos los campos"
            document.getElementById("alerta2").className = "modal-body alert alert-danger"
            $("#modAlert2").modal("show")
            return;
        }
        $.ajax({
            url: "../controllers/login.php",
            type: "POST",
            data: $("#form-login").serialize(),
            success: function(res){ 
                if (res.estado==0) {
                    document.getElementById("msnAlert2").innerHTML = res.mensaje
                    document.getElementById("alerta2").className = "modal-body alert alert-danger"
                    $("#modAlert2").modal("show")
                }else{
                    window.location.assign ("../controllers/ctrlCuentas.php");
                }
            }
        })
    })
})
