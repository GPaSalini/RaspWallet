$(document).ready(function(){
    $("form").submit(function(e) {
      e.preventDefault()
    })

    $("#confirmar").click(function(){
        $.ajax({
            url: "../controllers/signup.php",
            type: "POST",
            data: $("#form-register").serialize(),
            success: function(res){  
                alert_modal(res.mensaje,res.estado)
            }
        })
    })
})

//Modal con el mensaje de alerta
function alert_modal(msn,success){
    classAlert = " "
    if (success==1){
        classAlert = "modal-body alert alert-success"
    }else{
        classAlert = "modal-body alert alert-danger"
    }
    document.getElementById("msnAlert").innerHTML = msn
    document.getElementById("alerta").className = classAlert
    $("#modAlert").modal("show")
}