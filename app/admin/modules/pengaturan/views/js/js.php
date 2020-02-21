<script>
    $(document).ready(function() {
        $('#table_dokumen').DataTable();

        $("#formEdit").submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();

            $.ajax({
                url: '<?php echo site_url('pengaturan/ajax_action_edit_user')?>',
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

        $("#formPpdb").submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();

            $.ajax({
                url: '<?php echo site_url('pengaturan/ajax_action_ppdb')?>',
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

        $("#edit-password-trigger").change(function(){
            if($(this).is(':checked'))
            {
                $("#edit-password").css('display', 'block');
            }else
            {
                $("#edit-password").css('display', 'none');
            }
        });
    });
</script>

<script>
    function remove() {
        Swal.fire({
            title: 'Hapus Pengguna Ini ?',
            text: "Apakah anda akan menghapus Pengguna ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Hapus Pengguna Ini'
        }).then((result) => {
            if (result.value) {}
        })
    }
</script>