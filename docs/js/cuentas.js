$(document).ready(function(){
    $("form").submit(function(e) {
      e.preventDefault()
    })

    $("#confirmarNew").click(function(){
        if (document.forms["form-newAcc"]["nCuenta"].value=="" || document.forms["form-newAcc"]["nDesc"].value=="") {
            alert_modal("#modalNewAcc","Complete todos los campos",0);
            return;
        }
        $.ajax({
            url: "./newCuenta.php",
            type: "POST",
            data: $("#form-newAcc").serialize(),
            success: function(res){  
                alert_modal('#modalNewAcc',res.mensaje,res.estado)
            }
        })
    })

    $("#confirmarMod").click(function(){
        if (document.forms["form-modAcc"]["mCuenta"].value=="" || document.forms["form-modAcc"]["mDesc"].value=="") {
            alert_modal("#modalModAcc","Complete todos los campos",0);
            return;
        }
        $.ajax({
            url: "./modCuenta.php",
            type: "POST",
            data: $("#form-modAcc").serialize(),
            success: function(res){  
                alert_modal('#modalModAcc',res.mensaje,res.estado)
            }
        })
    })

    $("#cancelarNew").click(function(){
        clean_modal("form-newAcc")
    })

    $("#cancelarMod").click(function(){
        clean_modal("form-modAcc")
    })
})

//Limpia los inputs del modal
function clean_modal(mod){
    var list = document.getElementById(mod).getElementsByClassName("modal-input")
    if (list && list.length>0){
        for (let i=0;i<list.length;i++){
            list[i].className = "form-control inputuser modal-input"
        }
    }
}

function cargar_modal(id_acc){
    $.ajax({
      url: './loadCuenta.php',
      type: "POST",
      data: {id:id_acc},
        success: function(res) {
            document.getElementById("mId").value = res[0].id_acc
            document.getElementById("mCuenta").value = res[0].account
            document.getElementById("mDesc").value = res[0].description
        },
        error: function() {
            console.log("No se ha podido obtener la información")
        }
    })
}