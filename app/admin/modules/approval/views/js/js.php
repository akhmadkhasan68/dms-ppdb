<script>
    function terima() {
        Swal.fire({
            title: 'Terima Dokumen Ini !',
            text: "Apakah anda ingin Mengijinkan dokumen ini",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Ijinkan'
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