var sendRequest = function (url, data, success_callback, error_callback) {
    $.ajax({
        url: url,
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        dataType: "json",
        success: function (result) {
            let status = result.status;

            if (status != null && status != undefined) {
                if (status == 200) {
                    let data = result.data;
                    success_callback(data);
                } else {
                    let code = result.code;
                    if (code != null && code != undefined) {

                        if(code == "8"){
                            toastr.warning("Request parameters are incorrect.");
                            return false;
                        }else if(code == "10"){
                            toastr.warning("You are an unauthorized user.");
                            return false;
                        }else if(code == "11"){
                            toastr.warning("No data exists.");
                            return false;
                        }else if(code == "12"){
                            toastr.warning("Data base manipulation failed.");
                            return false;
                        }else if(code == "13"){
                            toastr.warning("Password are incorrect.");
                            return false;
                        }else if(code == "14"){
                            toastr.warning("You are an unregistered user.");
                            return false;
                        }

                        error_callback(code);
                    }
                }
            }else{
                // toastr.error("Server Disconnect!");
            }
            
        },
        error: function (result) {
            // toastr.error("Server Disconnect!");
        },
    });
};

toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};