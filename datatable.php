<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.7/css/scroller.jqueryui.min.css">
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

        $(document).ready(function() {
            $('#example').DataTable({

                "ajax": {
                    "url": "apiManager/getSabyTable", //task do refresh the table after 30 sec 
                },
                "columns": [{
                        "data": "id" // data ---> and how the data name come from database 
                    },
                    {
                        "data": "saby"
                    },
                    {
                        "data": "server"
                    }
                ]
            });
            /*setInterval(function() {
                $('#example').load("apiManager/getSabyTable");
                refresh();
            }, 30000);*/
        });
    })
    </script>
</body>

</html>
