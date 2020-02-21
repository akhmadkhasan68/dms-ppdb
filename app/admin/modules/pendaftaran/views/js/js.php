<script>
    $(document).ready(function() {
        $('#table_dokumen').DataTable();

    });
</script>
<script>
    function open_detail() {
        window.location.href = "<?php echo base_url(); ?>pendaftaran/detail_siswa";
    }
</script>

<script>
    function remove() {
        Swal.fire({
            title: 'Hapus Siswa Ini ?',
            text: "Apakah anda akan menghapus siswa ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Hapus siswa Ini'
        }).then((result) => {
            if (result.value) {}
        })
    }
</script>