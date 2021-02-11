$(document).ready(function(){
    $("form").submit(function(e) {
      e.preventDefault()
    })

    $("#confirmarNew").click(function(){
        $.ajax({
            url: "./newTransaccion.php",
            type: "POST",
            data: $("#form-newTran").serialize(),
            success: function(res){  
                alert_modal('#modalNewTran',res.mensaje,res.estado)
            }
        })
    })

    $("#confirmarMod").click(function(){
        $.ajax({
            url: "./modTransaccion.php",
            type: "POST",
            data: $("#form-modTran").serialize(),
            success: function(res){  
                alert_modal('#modalModTran',res.mensaje,res.estado)
            }
        })
    })

    $("#cancelarNew").click(function(){
        clean_modal("form-newTran")
    })

    $("#cancelarMod").click(function(){
        clean_modal("form-modTran")
    })
})

//Modal con el mensaje de alerta
function alert_modal(mod,msn,success){
    classAlert = " "
    if (success==1){
        classAlert = "modal-body alert alert-success"
    }else{
        classAlert = "modal-body alert alert-danger"
    }
    $(mod).modal("hide")
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

//Limpia los inputs del modal
function clean_modal(mod){
    var list = document.getElementById(mod).getElementsByClassName("modal-input")
    if (list && list.length>0){
        for (let i=0;i<list.length;i++){
            list[i].className = "form-control inputuser modal-input"
        }
    }
}

function cargar_modal(id_trs){
    $.ajax({
      url: './loadTransaccion.php',
      type: "POST",
      data: {id:id_trs},
        success: function(res) {
            document.getElementById("mId").value = res[0].id_trs
            document.getElementById("mCuenta").value = res[0].id_acc
            document.getElementById("mQn").value = res[0].quantity
            document.getElementById("mDate").value = res[0].datestamp
            document.getElementById("mDesc").value = res[0].description
        },
        error: function() {
            console.log("No se ha podido obtener la información")
        }
    })
}