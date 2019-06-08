$(document).ready(function() {
    $('#task-table').DataTable( {
        "order": [],
        "searching": false,
        "language": {
            "lengthMenu": "Записей на странице _MENU_",
            "zeroRecords": "Ничего не найдено",
            "info": "Страница _PAGE_ из _PAGES_",
            "infoEmpty": "No records available",
            "search": "Найти:",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "paginate": {
                "first":      "First",
                "last":       "Last",
                "next":       "->",
                "previous":   "<-"
            },
        },
        "lengthMenu": [[3, 10, 20, -1], [3, 10, 20, "Все"]],
        "aoColumnDefs": [
            {
              "bSortable": false,
              "aTargets": [ 3, -1 ]
             }
         ]
    } );
} );
