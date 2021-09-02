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
                myChart.destroy();
                graficar(res.labels,res.xVals);
            }
        })
    })
})


function graficar(labelsArr,xVals){
    var chartdata = {
        labels: labelsA,
        datasets: [
            {
                label: 'total',
                backgroundColor: '#49e2ff',
                borderColor: '#46d5f1',
                hoverBackgroundColor: '#CCCCCC',
                hoverBorderColor: '#666666',
                data: xVals
            }
        ]
    };
    var grafico = $("#myChart");
    myChart = new Chart(grafico, {type: 'bar', data: chartdata, options: {responsive: true}});
}
