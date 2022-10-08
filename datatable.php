<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.7/css/scroller.jqueryui.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Saby name</th>
                <th>Server name</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.0.7/js/dataTables.scroller.min.js"></script>

    <script>
        $(document).ready(function() {
            // $('#example').DataTable({
            //     ajax: "apiManager/getSabyTable",
            //     deferRender: true,
            //     scrollY: 200,
            //     scrollCollapse: true,
            //     scroller: true,
            //     // success: function(response) {
            //     //     var fullString = '';
            //     //     var jsonArray = JSON.parse(response);
            //     //     jsonArray.forEach(function(jsonitem) {
            //     //         fullString += "<tr>";
            //     //         fullString += "<td>" + jsonItem.id + "</td>";
            //     //         fullString += "<td>" + jsonItem.saby + "</td>";
            //     //         fullString += "<td>" + jsonItem.server + "</td></tr>";


            //     //     });
            //     //     console.log(fullString);
            //     //     $('#example tbody').append(fullString);
            //     //     $('#example').draw();
            //     // }
            // });
            function getSabyTable() {
                var table = $('#example').DataTable();
                table.destroy();
                $.ajax({
                    type: "GET",
                    url: "apiManager/getSabyTable",
                    success: function(response) {
                        $('#example').DataTable({
                            //destroy: true,
                            "ajax": {
                                "url": "apiManager/getSabyTable", //task do refresh the table after 30 sec 
                            },
                            "oLanguage": {
                                "oPaginate": {
                                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                                },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                                "sLengthMenu": "Results :  _MENU_",
                            },
                            dom: '<"container-fluid"<"row"<"col"B><"col"l><"col"f>>>rtip',
                            "lengthMenu": [100, 500, 1000],
                            "pageLength": 100,
                            "columns": [{
                                    "data": "id"
                                },
                                {
                                    "data": "saby"
                                },
                                {
                                    "data": "server"
                                }
                            ]
                        });
                    }
                });
            }
            $(document).ready(function() {
                getSabyTable();
                $('#example').DataTable().destroy();
                setInterval(function() {
                    getSabyTable();
                }, 10000);
            });
        })
    </script>
</body>

</html>
