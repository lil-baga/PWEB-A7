$(document).ready(function() {
    function filterRows(searchText) {
        $('.table tbody tr').each(function() {
            var nama = $(this).find('td:eq(0)').text().toLowerCase();
            var nim = $(this).find('td:eq(1)').text().toLowerCase();
            var judul = $(this).find('td:eq(2)').text().toLowerCase();
            if (searchText === '' || nama.includes(searchText) || nim.includes(searchText) || judul.includes(searchText)) {
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