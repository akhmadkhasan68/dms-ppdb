function addItemSerialize(url, type, param) {
    $.ajax({
        url: url,
        type: type,
        dataType: "json",
        data: param,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $(".loader").fadeIn();
        },
        success: function (response) {
            $(".loader").fadeOut();
            if (response.result) {
                message("Selamat", response.message.body, "success", "info", 1000);
                setTimeout(function () {
                    window.location = response.redirect
                }, 500);
            } else {
                message("Mohon Maaf", response.message.body, "error", "info", 1000);
            }
        },
        error: function (request, status, error) {
            $(".loader").fadeOut();
            message("Mohon Maaf", "Silahkan Coba Kembali", "error", "info", 1000);
        }
    });
}


function addItemSerializeLogin(url, type, param) {
    $.ajax({
        url: url,
        type: type,
        dataType: "json",
        data: param,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            Swal.showLoading();
            $('#page-load').show();
        },
        success: function (response) {

            if (response.result) {
                message("Selamat", response.message.body, "success", "info", 1000);
                location.reload();
            } else {
                message("Mohon Maaf", response.message.body, "error", "info", 1000);
            }
        },
        error: function (request, status, error) {

            message("Mohon Maaf", "Silahkan Coba Kembali", "error", "info", 1000);
        }
    });
}

function addItemSerializecart(url, type, param) {
    $.ajax({
        url: url,
        type: type,
        dataType: "json",
        data: param,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            Swal.showLoading();
            $('#page-load').show();
        },
        success: function (response) {
            location.reload()

        },
        error: function (request, status, error) {

            location.reload()
        }
    });
}

function ajaxShowData(url, type, param, callback) {
    $.ajax({
        url: url,
        type: type,
        dataType: "json",
        data: param,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () { },
        success: callback,
        error: function (request, status, error) {
            alert(status);
        }
    });
}


function ajaxShowDataOutside(url, type, param, callback) {
    $.ajax({
        url: url,
        type: type,
        dataType: "json",
        beforeSend: function () {
            Swal.showLoading();
            $('#page-load').show();
        },
        success: callback,
        error: function (request, status, error) {
            alert(status);
        }
    });
}



function dataTableShow(id, url, param) {
    $(id).DataTable({
        "processing": true, //Feature control the processing indicator.
        "responsive": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": url,
            "type": "POST"
        },

    });

}
// alert(url);    

function ajaxItemDelete(link, url, id) {
    Swal.fire({
        title: 'Hapus Data Ini??',
        text: "Pastikan anda benar benar ingin menghapus data ini!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#f5365c',
        confirmButtonText: 'Ya, Hapus Data Ini!'
    }).then((result) => {
        Swal.showLoading();
        if (result.value) {
            $.ajax({
                url: link + "/" + url + "/" + id,
                type: "GET",
                dataType: "json",
                beforeSend: function () {
                    $('#page-load').show();
                },
                success: function (data) {

                    if (data.result) {
                        message("Selamat !", data.message.body, "success", "info", 1000);
                        setTimeout(function () {
                            window.location = data.redirect
                        }, 500);
                    } else {
                        message("Mohon Maaf !", data.message.body, "error", "info", 1000);
                    }

                },
                error: function (request, status, error) {

                    message("Mohon Maaf !", 'Please try again later', "error", "info", 1000);
                }
            });
        }
    })


}

function ajaxItemDelete2(link, url, id) {
    Swal.fire({
        title: 'Hapus Data Ini??',
        text: "Pastikan anda benar benar ingin menghapus data ini!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#f5365c',
        confirmButtonText: 'Ya, Hapus Data Ini!'
    }).then((result) => {
        Swal.showLoading();
        if (result.value) {
            $.ajax({
                url: link + url + "/" + id,
                type: "POST",
                dataType: "json",
                beforeSend: function () {
                    $('#page-load').show();
                },
                success: function (data) {

                    if (data.result) {
                        message("Selamat !", data.message.body, "success", "info", 1000);
                        setTimeout(function () {
                            window.location = data.redirect
                        }, 500);
                    } else {
                        message("Mohon Maaf !", data.message.body, "error", "info", 1000);
                    }

                },
                error: function (request, status, error) {

                    message("Mohon Maaf !", 'Please try again later', "error", "info", 1000);
                }
            });
        }
    })


}

function message(title, text, type, style, timer) {
    if (style == "info") {
        Swal.fire({
            title: title,
            text: text,
            type: type,
            timer: timer
        });
    } else if (style == "html") {
        Swal.fire({
            title: title,
            html: text,
            type: type,
            timer: timer
        });
    }


}



var loadFile = function (event, id) {
    var output = document.getElementById(id);
    output.src = URL.createObjectURL(event.target.files[0]);
};

function addNumber(nStr, symbol = false) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    if (symbol)
        return "Rp. " + x1 + x2;
    else
        return x1 + x2;
}

