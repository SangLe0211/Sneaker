
$(document).ready(function () {
$('.header_bottom').slick({
dots: true,
infinite: true,
speed: 300,
fade: true,
prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
autoplay: true,
autoplaySpeed: 5000,
cssEase: 'ease'
});
});

$('a').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
  });
// $('.header_bottom').slick();


$('.main_menu_btn').click(function(){
  $(this).toggleClass("click");
  $('.header_top_center_center').toggleClass("show");
 
});

$('.main_menu li').click(function(){
  $(this).addClass("actives").siblings().removeClass("actives");
});

$('.serv-btn').click(function(){
  $('.sub_menu').toggleClass("show1");
  $('ul .second').toggleClass("rotate");
});



$(document).ready(function(){
  $(window).scroll(function(){
    if($(this).scrollTop()){
      $('#back_top').fadeIn();
    }else{
      $('#back_top').fadeOut();
    }
  });
  $('#back_top').click(function(){
    $('html, body').animate({scrollTop: 0}, 600);
  });
});
