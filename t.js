$('#recordsFilterForm').submit(function (e) {
var queryType = $('#queryType').val();
if (queryType == '--------------') {
alert("You Must Select A Filter");
return false;
}
var actionType = $('#actionType').val();
var duration = $('#duration').val();
//$('#filterSubmit').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2">
    <line x1="12" y1="2" x2="12" y2="6"></line>
    <line x1="12" y1="18" x2="12" y2="22"></line>
    <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
    <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
    <line x1="2" y1="12" x2="6" y2="12"></line>
    <line x1="18" y1="12" x2="22" y2="12"></line>
    <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
    <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
</svg> GET');
var dateValue = $('#basicFlatpickr').val();
$('#loaderLoaded').empty().append('<div class="loader-table dual-loader-table mx-auto-table"></div>');
$.ajax({
type: "POST",
url: "../Query.php",
data: {
//'caller': callerFilter,
//'callee': calleeFilter,
'queryType': queryType,
'duration': duration,
'sessionType': 3,
'actionType': actionType,
'dateValue': dateValue,
},
success: function (response) {
var array = response.split(",");
result = array[0];
$('#tbl_exporttable_to_xls').DataTable().destroy();
$('#tbl_exporttable_to_xls tbody').empty();
$('#tbl_exporttable_to_xls tbody').append(result);
$('#total-title').val(array[1]);
$('#tbl_exporttable_to_xls').DataTable({
dom: '<"container-fluid"<"row"<"col"B>
    <"col"l>
        <"col"f>>>rtip',
            order: [
            [1, "desc"]
            ],
            deferLoading: 57,
            buttons: {
            buttons: [{
            extend: 'excel',
            className: 'btn',
            exportOptions: {
            columns: [0, 1, 2, 3, 11, 12]
            }
            }]
            },
            "responsive": true,
            "processing": true,
            "oLanguage": {
            "oPaginate": {
            "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>',
            "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results : _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [
            [50, 100, 200, -1],
            [50, 100, 200, 'All'],
            ],
            "pageLength": 50,
            initComplete: function () {
            //$("#filterSubmit").html("GET");
            $('#loaderLoaded').empty();