<script>
    $(document).ready(function() {
        $("#table_dokumen").DataTable();
    });
</script>
<script>
    function download() {
        Swal.fire({
            title: 'Unduh Dokumen Ini !',
            text: "Apakah anda ingin mengunduh dokumen ini",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Unduh Dokumen Ini'
        }).then((result) => {
            if (result.value) {}
        })
    }
</script>

<script>
    function remove() {
        Swal.fire({
            title: 'Hapus Dokumen Ini ?',
            text: "Apakah anda akan menghapus dokumen ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Hapus Dokumen Ini'
        }).then((result) => {
            if (result.value) {}
        })
    }
</script>