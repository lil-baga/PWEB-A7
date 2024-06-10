$(document).ready(function() {
    function filterRows(searchText) {
        $('.table tbody tr').each(function() {
            var judul = $(this).find('td:eq(0)').text().toLowerCase();
            if (searchText === '' || judul.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
  
    $('#live-search').on('keydown', function(event) {
        if (event.key === "Enter") {
            var searchText = $(this).val().toLowerCase();
            filterRows(searchText);
        }
    });
  
    $('#live-search').on('input', function() {
        var searchText = $(this).val().toLowerCase();
        if (searchText === '') {
            $('.table tbody tr').show();
        } else {
            filterRows(searchText);
        }
    });
  });