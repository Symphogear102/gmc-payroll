$(document).ready(function () {
  $("#example").DataTable({
    order: [[0, "desc"]],
    columnDefs: [{ width: "0%", targets: 0 }],
  });
  $("#extra").DataTable({
    order: [[0, "desc"]],
  });
  $("#extra2").DataTable({
    order: [[1, "desc"]],
  });
});
