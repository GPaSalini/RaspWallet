let myChart;

$(document).ready(function(){
    $("form").submit(function(e) {
        e.preventDefault()
    })

    $("#aplicar").click(function(){
        $.ajax({
            url: "./getGrafico.php",
            type: "POST",
            data: $("#form-config").serialize(),
            success: function(res){
                if (res.estado==1){
                    myChart.destroy();
                    graficar(res.labels,res.xVals);
                } else {
                    document.getElementById("msnAlert").innerHTML = res.mensaje
                    document.getElementById("alerta").className = "modal-body alert alert-danger"
                    $("#modAlert").modal("show")
                }
            }
        })
    })
})


function graficar(namechart,labelsArr,xVals){
    var chartdata = {
        labels: labelsArr,
        datasets: [
            {
                label: "$",
                backgroundColor: '#720c0c',
                borderColor: '#46d5f1',
                hoverBackgroundColor: '#500505',
                hoverBorderColor: '#666666',
                data: xVals
            }
        ]
    };
    var grafico = $("#"+namechart);
    myChart = new Chart(grafico, {type: 'bar', data: chartdata, options: {responsive: true}});
}
