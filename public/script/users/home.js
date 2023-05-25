// checkbox
$('#checkbox').click(function(){
    window.location.href = urls.content18;
});


// swiper
var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay : {
        delay: 3000
    }
});
