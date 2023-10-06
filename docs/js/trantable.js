$('#dttable').DataTable({
    "order": [[ 2, "desc" ]],
    "columnDefs": [{
        targets: 1,
        data: 'Monto',
        render: $.fn.dataTable.render.number('.',',',0,'$')
    }],
    dom: '<"top"Bfr>rt<"bottom"lpi><"clear">',
    buttons: ['copy','csv','excel','pdf','print'],
    responsive: true,
    "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":	   "_MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Registros _START_ al _END_   Total _TOTAL_",
        "sInfoEmpty":      "Sin registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:&nbsp;&nbsp;",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Ordena la columna ascendente",
            "sSortDescending": ": Ordena la columna descendente"
        }
    }
});