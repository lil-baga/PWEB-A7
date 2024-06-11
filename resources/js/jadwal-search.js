$(document).ready(function() {
    function filterRows(searchText) {
        $('.table tbody tr').each(function() {
            var nama = $(this).find('td:eq(0)').text().toLowerCase();
            var nim = $(this).find('td:eq(1)').text().toLowerCase();
            var judul = $(this).find('td:eq(2)').text().toLowerCase();
            var tanggal = $(this).find('td:eq(3)').text().toLowerCase();
            var pembahas1_id = $(this).find('td:eq(4)').text().toLowerCase();
            var pembahas2_id = $(this).find('td:eq(5)').text().toLowerCase();
            var pembimbing1_id = $(this).find('td:eq(6)').text().toLowerCase();
            var pembimbing2_id = $(this).find('td:eq(7)').text().toLowerCase();
            if (searchText === '' || nama.includes(searchText) || nim.includes(searchText) || judul.includes(searchText)
                || tanggal.includes(searchText) || pembahas1_id.includes(searchText) || pembahas2_id.includes(searchText)
                || pembimbing1_id.includes(searchText) || pembimbing2_id.includes(searchText)) {
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