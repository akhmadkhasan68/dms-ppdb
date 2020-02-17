<script>
    $(document).ready(function() {
        var form_data = new FormData();
        form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
        dataTableShow("#table_dokumen", "<?php echo base_url() . $this->config->item('index_page'); ?>dokumen/ajax_list_dokumen", form_data);
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

    function showApproval(id)
    { 
        $("#show-modal-approval").trigger('click');
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