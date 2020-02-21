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
                    $('#status_pendaftaran').html(response.data[0].status_pendaftaran)
                    var status = response.data[0].status_pendaftaran;
                    if (status == "BELUM") {
                        $('#div_status_pendaftaran').addClass("alert alert-info");
                    } else if (status == "DITERIMA") {
                        $('#div_status_pendaftaran').addClass("alert alert-success");
                    } else {
                        $('#div_status_pendaftaran').addClass("alert alert-danger");
                    }
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

<script>
    function cetak_bukti() {
        Swal.fire({
            title: 'Apakah anda ingin mencetak bukti pendafaran ini ?',
            text: "",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Cetak Bukti Ini'
        }).then((result) => {
            if (result.value) {
                window.location.href = "<?php echo base_url() . $this->config->item('index_page'); ?>ppdb/pengumuman_cetak/" + $("#nisn").val();
            }
        })
    }
</script>