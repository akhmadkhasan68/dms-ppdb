<script>
    $(document).ready(function() {
        var form_data = new FormData();
        form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
        dataTableShow("#table_approval", "<?php echo base_url() . $this->config->item('index_page'); ?>approval/ajax_list_approval", form_data);
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