<script>
    $(document).ready(function() {
        var form_data = new FormData();
        form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
        dataTableShow("#table_approval", "<?php echo base_url() . $this->config->item('index_page'); ?>approval/ajax_list_approval", form_data);
    });
</script>
<script>
    function terima(id) {
        Swal.fire({
            title: 'Terima Dokumen Ini !',
            text: "Apakah anda ingin Mengijinkan dokumen ini",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?php echo site_url('approval/ajax_action_approve');?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: id,
                        status: 'DITERIMA',
                        <?php echo $this->security->get_csrf_token_name();?>: '<?php echo $this->security->get_csrf_hash();?>'
                    },
                    beforeSend: function(){
                        $(".loader").show();
                    },
                    success: function(response)
                    {   
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

<script>
    function tolak(id) {
        Swal.fire({
            title: 'Tolak  Dokumen Ini ?',
            text: "Apakah anda akan Menolak dokumen ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Tolak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?php echo site_url('approval/ajax_action_approve');?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: id,
                        status: 'DITOLAK',
                        <?php echo $this->security->get_csrf_token_name();?>: '<?php echo $this->security->get_csrf_hash();?>'
                    },
                    beforeSend: function(){
                        $(".loader").show();
                    },
                    success: function(response)
                    {   
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