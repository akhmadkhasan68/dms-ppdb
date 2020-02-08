<script>
    $(document).ready(function() {
        $('#table_dokumen').DataTable();
    });
</script>

<script>
    function remove() {
        Swal.fire({
            title: 'Hapus Pengguna Ini ?',
            text: "Apakah anda akan menghapus Pengguna ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Hapus Pengguna Ini'
        }).then((result) => {
            if (result.value) {}
        })
    }
</script>