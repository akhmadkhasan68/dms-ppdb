<script>
    $(document).ready(function() {
        var form_data = new FormData();
        form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
        dataTableShow("#table_dokumen", "<?php echo base_url() . $this->config->item('index_page'); ?>pengguna/ajax_list_user", form_data);

        $("#form-add-user").submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();

            $.ajax({
                url: '<?php echo site_url('pengguna/ajax_action_add_user');?>',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {
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
        });
    });
</script>

<script>
    var base_url = '<?php echo base_url();?>';

    function remove(id) {
        Swal.fire({
            title: 'Hapus Pengguna Ini ?',
            text: "Apakah anda akan menghapus Pengguna ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Hapus Pengguna Ini'
        }).then((result) => {
            if (result.value) {
                //message(response.message.head, response.message.body, "success", "info", 1000);
                $.ajax({
                    url: '<?php echo site_url('pengguna/ajax_action_delete_user');?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        id : id,
                        <?php echo $this->security->get_csrf_token_name();?>: '<?php echo $this->security->get_csrf_hash();?>'
                    },
                    beforeSend: function() {
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
                        alert("Error Data!");
                    }
                });
            }
        })
    }
    function activeUser(id, is_active) {
        if(is_active == 1){
            var title = 'Aktifkan pengguna ini ?';
            var text = "Apakah anda akan mengaktifkan Pengguna ini";
            var confirmButtonText = 'Ya, Aktifkan Pengguna Ini';
        }else{
            var title = 'Nonaktifkan pengguna ini ?';
            var text = "Apakah anda akan Nonaktifkan Pengguna ini";
            var confirmButtonText = 'Ya, Nonaktifkan Pengguna Ini';
        }

        Swal.fire({
            title: title,
            text: text,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: confirmButtonText
        }).then((result) => {
            if (result.value) {
                //message(response.message.head, response.message.body, "success", "info", 1000);
                $.ajax({
                    url: '<?php echo site_url('pengguna/ajax_action_active_user');?>',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        id : id,
                        is_active : is_active,
                        <?php echo $this->security->get_csrf_token_name();?>: '<?php echo $this->security->get_csrf_hash();?>'
                    },
                    beforeSend: function() {
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
                        alert("Error Data!");
                    }
                });
            }
        })
    }
</script>