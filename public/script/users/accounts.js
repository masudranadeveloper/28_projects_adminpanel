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
