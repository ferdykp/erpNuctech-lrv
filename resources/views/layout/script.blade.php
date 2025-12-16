<script>
    // -------------------------------
    // Fungsi Fetch Data AJAX
    // -------------------------------
    function fetchData(customUrl = null) {
        let form = $('#filterForm');
        let url = customUrl ?? form.attr('action');

        $.ajax({
            url: url,
            type: 'GET',
            data: form.serialize(),
            beforeSend: function() {
                $('#tableContainer').css('opacity', '0.4');
            },
            success: function(response) {
                let newTable = $(response).find('#tableContainer').html();
                $('#tableContainer').html(newTable).css('opacity', '1');
            },
            error: function() {
                alert("Gagal memuat data.");
                $('#tableContainer').css('opacity', '1');
            }
        });
    }

    // -------------------------------
    // Debounce Search (500ms)
    // -------------------------------
    let timer = null;

    $('#searchInput').on('keyup', function(e) {
        e.preventDefault(); // cegah enter submit form
        clearTimeout(timer);
        timer = setTimeout(fetchData, 100);
    });

    // Disable enter pada seluruh form
    $('#filterForm').on('keydown', function(e) {
        if (e.key === 'Enter') e.preventDefault();
    });

    // -------------------------------
    // Auto Submit (Sort + Date Range)
    // -------------------------------
    $('.auto-submit').on('change', function() {
        fetchData();
    });

    $('.filter-input').on('change', function() {
        fetchData();
    });


    // -------------------------------
    // PAGINATION AJAX
    // -------------------------------
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        fetchData(url);
    });
</script>
<script>
    // REFRESH FILTER
    $('#refreshButton').on('click', function() {

        // Kosongkan semua input
        $('#searchInput').val('');
        $('[name="sort"]').val('desc');
        $('[name="start_date"]').val('');
        $('[name="end_date"]').val('');

        // Hapus query string dari URL (penting)
        window.history.replaceState({}, '', window.location.pathname);

        // Fetch ulang tabel via AJAX
        fetchData();
    });
</script>
