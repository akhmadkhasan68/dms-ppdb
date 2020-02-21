<script>
    $(document).ready(function() {
        var form_data = new FormData();
        form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
        dataTableShow("#table_share", "<?php echo base_url() . $this->config->item('index_page'); ?>share/ajax_list_sharing", form_data);

        $("#formSendDoc").submit(function(e){
            e.preventDefault();

            var data = $(this).serialize();

            $.ajax({
                url: '<?php echo site_url('share/ajax_action_send_doc');?>',
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
                    alert('Error Data!');
                }
            });
        });
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

    function sendFile(id) {
        $.ajax({
            url: '<?php echo site_url('dokumen/ajax_get_doc_by_id');?>',
            type: 'GET',
            dataType: 'JSON',
            data: {
                id: id,
                <?php echo $this->security->get_csrf_token_name();?>: '<?php echo $this->security->get_csrf_hash();?>'
            },
            success: function(response)
            {   
                //SET VALUE
                $("#id-document").val(response.data.id);
                $("#is-approval-send").val(response.data.is_approval);
                $("#name-send").val(response.data.name);
                $("#file-send").val(response.data.file);
                
                //TRIGGER SHOW MODAL
                $("#show-modal-send").trigger('click');
            },
            error: function(){
                alert("Error Data!");
            }
        });
    }
</script>