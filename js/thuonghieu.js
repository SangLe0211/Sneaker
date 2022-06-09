$('.main_center-product_trademark-content_product').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    draggable: false,
    arrows: false,
    // fade: true,
    vertical:true,
    asNavFor: '.main_center-product_trademark-content_tab'
  });
  $('.main_center-product_trademark-content_tab').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.main_center-product_trademark-content_product',
    dots: false,
    draggable: false,
    centerMode: true,
    focusOnSelect: true,
    arrows: false,
    infinite: false,
   
  });

  $('li ').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
  });


  $('.main_center-slider_trademark').slick({
    centerMode: true,
    centerPadding: '0px',
    slidesToShow: 5,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 2000,  
    prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: true,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });



  $(document).ready(function () {
    $(".trademark-content_product-item_right").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      arrows: true,
      draggable: true,
      prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
      nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
      dots: false,
      responsive: [
        {
          breakpoint: 1025,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 825,
          settings: {
            slidesToShow: 3,
           
          },
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 2,
           
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            arrows: false,
            infinite: false,
          },
        },
      ],
      // autoplay: true,
      // autoplaySpeed: 1000,
    });
  });



  