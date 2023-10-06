const chile = new Intl.NumberFormat("es-CL", { currency: "CLP", style: "currency" })

let myChart;

$(document).ready(function(){
    $("form").submit(function(e) {
        e.preventDefault();
    })

    $("#aplicar").click(function(){
        $.ajax({
            url: "./getGrafico.php",
            type: "POST",
            data: $("#form-config").serialize(),
            success: function(res){
                if (res.estado==1){
                    myChart.destroy();
                    graficar("myChart",res.labels,res.xVals);
                    document.getElementById("card-income").innerHTML = chile.format(res.income);
                    document.getElementById("card-outcome").innerHTML = chile.format(res.outcome);
                } else {
                    document.getElementById("msnAlert").innerHTML = res.mensaje;
                    document.getElementById("alerta").className = "modal-body alert alert-danger";
                    $("#modAlert").modal("show");
                }
            }
        })
    })
})


function graficar(namechart,labelsArr,xVals){
    var srcdata = {
        labels: labelsArr,
        datasets: [
            {
                backgroundColor: '#720c0c',
                borderColor: '#46d5f1',
                hoverBackgroundColor: '#500505',
                hoverBorderColor: '#666666',
                data: xVals
            }
        ]
    };
    var grafico = $("#"+namechart);
    var myCharData = {
        type: 'bar',
        data: srcdata,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    ticks: {
                        display: false
                    }
                }
            }
        }
    };
    myChart = new Chart(grafico,myCharData);
}
