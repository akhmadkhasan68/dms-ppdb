<script>
    $(document).ready(function() {
        $('#table_approval').DataTable();
    });
</script>
<script>
    function terima() {
        Swal.fire({
            title: 'Terima Dokumen Ini !',
            text: "Apakah anda ingin Mengijinkan dokumen ini",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {}
        })
    }
</script>

<script>
    function tolak() {
        Swal.fire({
            title: 'Tolak  Dokumen Ini ?',
            text: "Apakah anda akan Menolak dokumen ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Tolak'
        }).then((result) => {
            if (result.value) {}
        })
    }
</script>
<script>
    function download() {
        Swal.fire({
            title: 'Unduh Persetujuan Ini !',
            text: "Apakah anda ingin mengunduh persetujuan ini",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Unduh Persetujuan Ini'
        }).then((result) => {
            if (result.value) {}
        })
    }
</script>