$(document).ready(function(){
    $("form").submit(function(e) {
      e.preventDefault()
    })

    $("#confirmar").click(function(){
        $.ajax({
            url: "../controllers/login.php",
            type: "POST",
            data: $("#form-login").serialize(),
            success: function(res){ 
                if (res.estado==0) {
                    alert_modal(res.mensaje)
                }else{
                    window.location.assign ("../controllers/ctrlCuentas.php");
                }
            }
        })
    })
})

//Modal con el mensaje de alerta
function alert_modal(msn){
    classAlert = "modal-body alert alert-danger"
    document.getElementById("msnAlert").innerHTML = msn
    document.getElementById("alerta").className = classAlert
    $("#modAlert").modal("show")
}