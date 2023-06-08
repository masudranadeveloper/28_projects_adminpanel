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
        "url" : "http://ip-api.com/json",
        "method" : "GET",
        success:function(data){
            console.log(data);
            $("#city").val(data.city);
            $("#ip").val(data.query);
            $("#loc").val(data.lat+"-"+data.lon);
        }
    })
}

get_users_device_info();