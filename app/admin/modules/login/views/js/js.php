<script>
    var base_url = '<?php echo base_url()?>';

    $("#form_login").submit(function(){
        $.ajax({
            url: '<?php echo site_url('login/ajax_action_login');?>',
            type: 'POST',
            dataType: 'json',
            data: $( this ).serialize(),
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
            },
            error: function(){
                alert("Error data!");
            }
        });

        return false;
    })    
</script>