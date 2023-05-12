$('#submit_form').submit(function(e){
    e.preventDefault();

    $('#sub_btn').html('Loadding...');
    $('#sub_btn').attr('disabled', true);
    $('#error').html("");

    let cache= "";
    if(localStorage.getItem("login")){
        console.log("true");
        cache = 1;
    }else{
        console.log("false");
        cache = 0;
    }
    // ajax
    $.ajax({
        "url" : urls.login,
        "method" : "POST",
        "data" : {
            "username" : $('#login_username').val(),
            "browser_cache" : cache
        },
        success:function(data){
            if(data.st == true){
                $('#sub_btn').html('SUCCESS');
                localStorage.setItem("login", $('#login_username').val());
                window.location.href=window.location.origin;
            }else{
                $('#sub_btn').html('TRY AGAIN');
                $('#error').html(data.msg);
            }
            $('#sub_btn').attr('disabled', false);
        }
    })
});
