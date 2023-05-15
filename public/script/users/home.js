// ajax
const ajax_function = () => {
    // ajax
    $.ajax({
        "url" : urls.expired_time,
        "method" : "POST",
        success:function(data){
            getCountdown(data.time*1000);
        }
    })
}
ajax_function();
var countdown = document.getElementById("dyahmss");

function getCountdown(time){
    setInterval(() => {
        var target_date = new Date(time);
        var current_date = new Date().getTime();
        var difference = (target_date - current_date);
        let days = Math.floor(difference / (1000 * 60 * 60 * 24));
        let hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((difference % (1000 * 60)) / 1000);
        countdown.innerHTML = "<span>" + days + "days </span><span>" + hours + "hours </span><span>" + minutes + "minutes </span><span>" + seconds + "seconds left</span>";
    }, 1000);
}

// checkbox
$('#checkbox').click(function(){
    window.location.href = urls.content18;
});
