<script>
    function ajax_cek_siswa() {
        // alert($('#nisn').val())
        if ($('#nisn').val() != "") {
            var link = "<?php echo base_url() . $this->config->item('index_page'); ?>ppdb/ajax_cek_status_siswa/";
            var form_data = new FormData();
            form_data.append('nisn', $('#nisn').val());
            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
            $(".loader").fadeIn();
            ajaxShowData(link, "POST", form_data, function(response) {
                if (response.result) {
                    $('#view_hasil').show(1000);
                    $('#txt_nisn').html(response.data[0].nisn);
                    $('#nama').html(response.data[0].nama_siswa);
                    $('#nama_sekolah').html(response.data[0].nama_sekolah);
                } else {
                    message("Mohon Maaf", "Nisn tidak di temukan", "error", "info", 1000);
                    $('#view_hasil').hide(1000);
                }
                $(".loader").fadeOut();
            });
        } else {
            $('#view_hasil').hide();
            message("Mohon Maaf", "Silahkan isi NISN", "error", "info", 1000);
        }

    }
</script>