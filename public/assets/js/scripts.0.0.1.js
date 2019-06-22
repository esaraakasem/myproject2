/*****************************************************/
/*** custom script for this project ***/
/*****************************************************/

$(window).load(function () {
  $(".loading-page").fadeOut(2000, function () {
    $('html, body').removeAttr('style');
  });
});


$('.main-slider .owl-carousel').owlCarousel({
    rtl:true,
    // loop:true,
    autoplay:false,
    autoplayTimeout:6000,
	smartSpeed:1000,
	items:1,
    margin:0,
    nav:true,
	navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ]
    
});
/*
$('.partners .owl-carousel').owlCarousel({
    rtl:true,
    loop:true,
    margin:10,
    nav:true,
	navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});*/
