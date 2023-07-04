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

$("#search_products").keyup(function(){
    // ajax 
    $.ajax({
        "url" : urls.search,
        "method" : "POST",
        "data" : {
            "where" : $("#where").val(),
            "type" : $("#checkbox").val(),
            "search" : $("#search_products").val()
        },
        success:function(data){
            var map_data = data.data;
            if(map_data.length == 0){
                $("#all_products_wrapper").html("<h4 class='text-danger title col-12'>No products found!</h4>");
            }else{
                let viewData = map_data.map((curE) => {
                    return `
                    <a href="${curE.links}" class="col-4 mt-3">
                        <img class="images" src="${urls.url}/images/products/${curE.pic}" alt="">
                        <h2 class="title">${curE.name}</h2>
                    </a>
                    `
                });
                $("#all_products_wrapper").html(viewData);
            }
        }
    });
});
