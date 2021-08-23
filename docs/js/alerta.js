//Modal con el mensaje de alerta
function alert_modal(mod,msn,success){
    classAlert = " "
    if (success==1){
        classAlert = "modal-body alert alert-success"
    }else{
        classAlert = "modal-body alert alert-danger"
    }
    $(mod).modal("hide")
    $("#modAlert").unbind()
    document.getElementById("msnAlert").innerHTML = msn
    document.getElementById("alerta").className = classAlert
    $("#modAlert").modal("show")
    $("#modAlert").on('hidden.bs.modal',function(){ 
        if (success==1){
            location.reload()
        }else{
            $(mod).modal("show")
        }
    });
}