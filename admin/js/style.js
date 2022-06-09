  $('.btn').click(function(){
    $(this).toggleClass("click");
    $('.wraper_center_main_left').toggleClass("show");
    $('.wraper_center_main_right').toggleClass("click");
    $('.wraper_center_main_right-path').toggleClass("click");
    $('.times').toggleClass("click");
    $('.right').toggleClass("rotate");
  });
  
  $('.feat-btn').click(function(){
    $('ul .feat-show').toggleClass("show");
    $('ul .first').toggleClass("rotate");
  });

  $('.brand-btn').click(function(){
    $('ul .brand-show').toggleClass("show2");
    $('ul .Third').toggleClass("rotate");
  });
  $('.serv-btn').click(function(){
    $('ul .serv-show').toggleClass("show1");
    $('ul .second').toggleClass("rotate");
  });
  $('ul li').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
  });