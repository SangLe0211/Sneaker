// $('.main_center_products_all-productss_rights').slick({
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     draggable: false,
//     arrows: false,
//     // fade: true,
//     // vertical:true,
//     asNavFor: '.main_center_products_all-productss_lefts'
//   });
//   $('.main_center_products_all-productss_lefts').slick({
//     slidesToShow: 4,
//     slidesToScroll: 1,
//     asNavFor: '.main_center_products_all-productss_rights',
//     dots: false,
//     draggable: false,
//     centerMode: false,
//     focusOnSelect: true,
//     arrows: false,
//     infinite: false,
   
//   });

  $('li ').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
  });
  $('a ').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
  });


$(document).ready(function(){
  $(window).scroll(function(){
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 700){
          $(this).addClass("slide");
        }
    });
  });
});

  $('.main_center-product_details-left_top').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: false,
    arrows: false,
    fade: true,
    vertical:false,
    infinite: true,
    // autoplay: true,
    // autoplaySpeed: 8000,  
    asNavFor: '.product_details-left_bottom_slider'
  });
  $('.product_details-left_bottom_slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.main_center-product_details-left_top',
    dots: false,
    draggable: true,
    // centerMode: true,
    focusOnSelect: true,
    prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    arrows: true,
    infinite: true,
    speed: 600,
   
  });
  $('.details-left_bottom-item ').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
  });

      
  


