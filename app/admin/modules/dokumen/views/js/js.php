<script>
    $(document).ready(function() {
        var form_data = new FormData();
        form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
        dataTableShow("#table_dokumen", "<?php echo base_url() . $this->config->item('index_page'); ?>dokumen/ajax_list_dokumen", form_data);

        $("#formSendDoc").submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Kirim Dokumen !',
                text: "Apakah anda ingin Mengirim dokumen ini",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#f5365c',
                confirmButtonText: 'Ya, Kirim Dokumen Ini'
            }).then((result) => {
                if (result.value) {
                    var data = $(this).serialize();

                    $.ajax({
                        url: '<?php echo site_url('dokumen/ajax_action_send_doc'); ?>',
                        type: 'POST',
                        dataType: 'JSON',
                        data: data,
                        beforeSend: function() {
                            $(".loader").show();
                        },
                        success: function(response) {
                            $(".loader").hide();
                            if (response.result == false) {
                                message(response.message.head, response.message.body, "error", "info");
                            }

                            if (response.result == true) {
                                message(response.message.head, response.message.body, "success", "info", 1000);
                                setInterval(function() {
                                    window.location.replace(base_url + response.redirect);
                                }, 1000);
                            }
                            console.log(response);
                        },
                        error: function() {
                            alert('Error Data!');
                        }
                    });
                }
            })


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

    function showApproval(id) {
        $.ajax({
            url: '<?php echo site_url('dokumen/ajax_get_approval') ?>',
            method: 'GET',
            dataType: 'json',
            data: {
                id: id,
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success: function(response) {
                var i;
                var no = 1;
                var html = '';
                var badges = '';

                for (i = 0; i < response.data.length; i++) {
                    html += `
                        <tr>
                            <td>` + no++ + `</td>
                            <td>` + response.data[i].name + `</td>
                            <td>` + response.data[i].file + `</td>
                            <td>` + response.data[i].admin + ` (` + response.data[i].level + `)</td>
                            <td>`;
                    if (response.data[i].status == "BELUM") {
                        html += `<div class='badge badge-warning'>Menunggu Approval</div>`;
                    } else if (response.data[i].status == "DITERIMA") {
                        html += `<div class='badge badge-success'>Approval Diterima</div>`;
                    } else if (response.data[i].status == "DITOLAK") {
                        html += `<div class='badge badge-danger'>Approval Ditolak</div>`;
                    }
                    html += `</td></tr>`;
                }
                console.log(response);
                $("#table-body-approval").html(html);
                $("#show-modal-approval").trigger('click');
            },
            error: function() {
                alert('Data Error !');
            }
        });
    }
</script>

<script>
    function remove(id) {
        Swal.fire({
            title: 'Hapus Dokumen Ini ?',
            text: "Apakah anda akan menghapus dokumen ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#f5365c',
            confirmButtonText: 'Ya, Hapus Dokumen Ini'
        }).then((result) => {
            if (result.value) {
                //message(response.message.head, response.message.body, "success", "info", 1000);
                $.ajax({
                    url: '<?php echo site_url('dokumen/ajax_action_delete_dokumen'); ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: id,
                        <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    beforeSend: function() {
                        $(".loader").show();
                    },
                    success: function(response) {
                        $(".loader").hide();

                        // if(response.result == false)
                        // {
                        //     message(response.message.head, response.message.body, "error", "info");
                        // }

                        // if(response.result == true)
                        // {
                        //     message(response.message.head, response.message.body, "success", "info", 1000);
                        //     setInterval(function(){ 
                        //         window.location.replace(base_url + response.redirect);
                        //     }, 1000);
                        // }
                        console.log(response);
                    },
                    error: function() {
                        alert("Error Data!");
                    }
                });
            }
        })
    }

    function sendFile(id) {
        $.ajax({
            url: '<?php echo site_url('dokumen/ajax_get_doc_by_id'); ?>',
            type: 'GET',
            dataType: 'JSON',
            data: {
                id: id,
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success: function(response) {
                //SET VALUE
                $("#id-document").val(response.data.id);
                $("#is-approval-send").val(response.data.is_approval);
                $("#name-send").val(response.data.name);
                $("#file-send").val(response.data.file);

                //TRIGGER SHOW MODAL
                $("#show-modal-send").trigger('click');
            },
            error: function() {
                alert("Error Data!");
            }
        });
    }
</script>