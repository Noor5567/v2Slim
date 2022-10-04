<!DOCTYPE html>
<html>
<header>
    <!-- CSS only -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</header>
<style>
table,
th,
td {
    border: 1px solid black;
}

</style>

<body>
    <table class="table" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>saby</th>
                <th>server</th>
                <th>easy_name</th>
                <th>ip</th>
                <th>last_update</th>
                <th>version</th>
                <th>environment_name</th>
                <th>ip_activation</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</body>
<script>
$.ajax({
    type: "GET",
    url: "apiManager/getSabyTable",
    success: function(response) {
        var fullString = '';
        var jsonArray = JSON.parse(response);
        jsonArray.forEach(function(jsonItem) {
            fullString += "<tr>";
            fullString += "<td>" + jsonItem.id + "</td>";
            fullString += "<td>" + jsonItem.saby + "</td>";
            fullString += "<td>" + jsonItem.server + "</td>";
            // fullString += "<td>" + jsonItem.easy_name + "</td>";
            //fullString += "<td>" + jsonItem.ip + "</td>";
            // fullString += "<td>" + jsonItem.last_update + "</td>";
            // fullString += "<td>" + jsonItem.version + "</td>";
            //fullString += "<td>" + jsonItem.environment_name + "</td>";
            //fullString += "<td>" + jsonItem.ip_activation + "</td>";
            //fullString += "</tr>";
        });

        $('.table tbody').empty().append(fullString);
    }
});
</script>

</html>
