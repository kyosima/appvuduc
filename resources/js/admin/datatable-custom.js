$(document).ready(function() {
    var order = $('#order').DataTable({
        columnDefs: [
            { orderable: false, targets: 9 }
          ],
          order: [[0, 'desc']],
    });
} );