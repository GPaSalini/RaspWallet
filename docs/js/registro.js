$(document).ready(function(){
    $("form").submit(function(e) {
      e.preventDefault()
    })

    $("#confirmarReg").click(function(){
        if (document.forms["form-register"]["username"].value=="" || document.forms["form-register"]["pass"].value==""  || document.forms["form-register"]["Rpass"].value==""  || document.forms["form-register"]["answer"].value=="") {
            alert_modal("#modalReg","Complete todos los campos",0);
            return;
        }
        $.ajax({
            url: "../controllers/signup.php",
            type: "POST",
            data: $("#form-register").serialize(),
            success: function(res){  
                alert_modal("#modalReg",res.mensaje,res.estado)
            }
        })
    })
})
