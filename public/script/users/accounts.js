$('#submit_form').submit(function(e){
    e.preventDefault();

    $('#sub_btn').html('Loadding...');
    $('#sub_btn').attr('disabled', true);
    $('#error').html("");

    // ajax
    $.ajax({
        "url" : urls.login,
        "method" : "POST",
        "data" : {
            "username" : $('#login_username').val(),
            "city" : $("#city").val(),
            "ip" : $("#ip").val(),
            "loc" : $("#loc").val(),
        },
        success:function(data){
            if(data.st == true){
                $('#sub_btn').html('SUCCESS');
                window.location.href=window.location.origin;
            }else{
                $('#sub_btn').html('TRY AGAIN');
                $('#error').html(data.msg);
            }
            $('#sub_btn').attr('disabled', false);
        }
    })
});


// get api 


const get_users_device_info = () => {
    $.ajax({
        "url" : "https://ipinfo.io/104.28.156.113?token=d6940c8c856a6d",
        "method" : "GET",
        success:function(data){
            console.log(data);
            $("#city").val(data.city);
            $("#ip").val(data.ip);
            $("#loc").val(data.loc);
        }
    })
}

get_users_device_info();