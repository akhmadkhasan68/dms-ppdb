<script>
    var base_url = '<?php echo base_url()?>';

    function login() {
        // message("Selamat", "Login Berhasil", "success", "info", 1000);
		// window.location.href = "<?php echo base_url() . 'dashboard'; ?>"
        var username = $("#username").val();
        var password = $("#password").val();
        var login_as = $("#login_as").val();

        $.ajax({
            url: '<?php echo site_url('login/ajax_action_login');?>',
            type: 'POST',
            dataType: 'json',
            data: {
                <?php echo $this->security->get_csrf_token_name();?>: '<?php echo $this->security->get_csrf_hash(); ?>',
                username: username,
                password: password,
                login_as: login_as
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
                    window.location.replace(base_url + response.redirect);
                }
            },
            error: function(){
                alert("Error data!");
            }
        });
    }
</script>