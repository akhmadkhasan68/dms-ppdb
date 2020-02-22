<script>
    $(document).ready(function() {
        var form_data = new FormData();
        form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
        dataTableShow("#table_pendaftaran", "<?php echo site_url('pendaftaran/ajax_list_pendaftaran'); ?>", form_data);
        
        var base_url = '<?php echo base_url()?>';

        $("#formVerif").submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: '<?php echo site_url('pendaftaran/ajax_action_verif_siswa');?>',
                type: 'POST',
                dataType: 'JSON',
                data: data,
                beforeSend: function(){
                    $(".loader").show();
                },
                success: function(response){
                    $(".loader").hide();
                    if(response.result == false)
                    {
                        message(response.message.head, response.message.body, "error", "info");
                    }

                    if(response.result == true)
                    {
                        message(response.message.head, response.message.body, "success", "info", 1000);
                        setInterval(function(){ 
                            window.location.replace(base_url + response.redirect);
                        }, 1000);
                    }
                    console.log(response);
                },
                error: function(){
                    alert("Data Error!");
                }
            });
        });

    });
</script>
<script>
    function open_detail(id) 
    {
        window.location.href = "<?php echo base_url(); ?>pendaftaran/detail_siswa/"+id;
    }

    function verifSiswa(id)
    {
        $.ajax({
            url: '<?php echo site_url('pendaftaran/ajax_get_pendaftaran_by_id')?>',
            method: 'GET',
            dataType: 'JSON',
            data: {
                id: id,
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success: function(response){
                $("#id-siswa-verif").val(response.data.id);
                $("#nama_siswa_verif").val(response.data.nama_siswa);
                $("#nisn_siswa_verif").val(response.data.nisn);
                $("#status_pendaftaran_verif").val(response.data.status_pendaftaran);
                $("#show-modal-verif-trigger").trigger('click');
            }
        });
    }
</script>

<script>
    function remove(id) {
        Swal.fire({
            title: 'Hapus Siswa Ini ?',
            text: "Apakah anda akan menghapus siswa ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Hapus siswa Ini'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?php echo site_url('pendaftaran/ajax_ation_delete_student');?>',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: id,
                        <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    beforeSend: function(){
                        $(".loader").show();
                    },
                    success: function(response){
                        $(".loader").hide();
                        if(response.result == false)
                        {
                            message(response.message.head, response.message.body, "error", "info");
                        }

                        if(response.result == true)
                        {
                            message(response.message.head, response.message.body, "success", "info", 1000);
                            setInterval(function(){ 
                                window.location.replace(base_url + response.redirect);
                            }, 1000);
                        }
                        console.log(response);
                    },
                    error: function(){
                        alert('Error Data!');
                    }
                });
            }
        })
    }
</script>