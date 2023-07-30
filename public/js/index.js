
// report datatable
$(document).ready(function () {
    $('#dtReport').DataTable({
        responsive: true,
        searching: false,
        language: {
            lengthMenu: '_MENU_',
            zeroRecords: "Tidak ada catatan yang cocok untuk ditemukan",
            infoEmpty: "Tidak ada data",
            emptyTable: "Tidak ada catatan yang cocok untuk ditemukan",
        },
        dom: 'Bfrtip',
        buttons: [{
                extend: 'copy',
                text: 'Copy ke Clipboard',
                footer: 'true', // Custom button text
                className: 'btn btn-primary' // Apply custom CSS class
            },
            {
                extend: 'csv',
                text: 'Export CSV',
                footer: 'true',
                className: 'btn btn-warning'
            },
            {
                extend: 'excel',
                text: 'Export Excel',
                footer: 'true',
                className: 'btn btn-success',

            },
            {
                extend: 'pdf',
                text: 'Export PDF',
                footer: 'true',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text: 'Print',
                footer: 'true',
                className: 'btn btn-info'
            }
        ]
    });
});