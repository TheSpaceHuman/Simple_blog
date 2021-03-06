$(function () {
  $('#myTable').DataTable();
  $(function () {
    var table = $('#example').DataTable({
      "columnDefs": [{
        "visible": false,
        "targets": 2
      }],
      "order": [
        [2, 'asc']
      ],
      "displayLength": 25,
      "drawCallback": function (settings) {
        var api = this.api();
        var rows = api.rows({
          page: 'current'
        }).nodes();
        var last = null;
        api.column(2, {
          page: 'current'
        }).data().each(function (group, i) {
          if (last !== group) {
            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
            last = group;
          }
        });
      }
    });
    // Order by the grouping
    $('#example tbody').on('click', 'tr.group', function () {
      var currentOrder = table.order()[0];
      if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
        table.order([2, 'desc']).draw();
      } else {
        table.order([2, 'asc']).draw();
      }
    });
  });
});
$('#example23').DataTable({
  dom: 'Bfrtip',
  buttons: [
    'copy', 'csv', 'excel', 'pdf', 'print'
  ]
});



$(document).ready(function() {
  $('.textarea_editor').wysihtml5();
});

$(function () {
  $('.qtagselect__select').tagselect();
});
// MAterial Date picker
$('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
/*
$('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
$('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });

$('#min-date').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', minDate: new Date() });*/
