$(document).ready(function() {
    var table = $('#rolestable').DataTable( {
        responsive: true
    } );

    new $.fn.dataTable.FixedHeader( table );
} );