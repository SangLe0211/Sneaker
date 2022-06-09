        <div id="back_top">
            <i class="fas fa-angle-double-up"></i>
        </div>
        <div class="footer">
        
            <div class="footer_main">
                <div class="footer_main_top">
                    <div class="footer_main_top_logo">
                        <a href="index.php">Sneaker</a>
                    </div>
                    <div class="footer_main_top_links">
                        <ul>
                            <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f facebook"></i></a></li>
                            <li><a href="https://www.google.com/"><i class="fab fa-google-plus-g google"></i></a></li>
                            <li><a href="https://www.instagram.com/"><i class="fab fa-instagram instagram"></i></a></li>
                            <li><a href="youtube.com"><i class="fab fa-youtube youtube"></i></a></li>
                            <li><a href="https://twitter.com/"><i class="fab fa-twitter twitter"></i></a></li>
                            <li><a href="https://www.pinterest.com/"><i class="fab fa-pinterest-p pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer_main_bottom">
                    <div class="footer_main_bottom_item">
                        <h4>Thông tin cửa hàng</h4>
                        <ul>
                            <li>Địa chỉ: 143 Nguyễn Lương Bằng, Hoà Khánh Bắc, Liên Chiểu, Đà Nẵng.</li>
                            <li>Email: Sneaker@gmail.com</li>
                            <li>SĐT: 0909099999</li>
                            <li>T.Gian: 9:00 - 20:00 (Th2 - Th7)</li>
                        </ul>
                        
                    </div>
                    <div class="footer_main_bottom_item">
                        <h4>Sản phẩm nổi bật</h4>
                        <ul>
                            <li><a href="thuonghieuid.php?idthuonghieu=7">Giày Nike</a></li>
                            <li><a href="thuonghieuid.php?idthuonghieu=8">Giày Adidas</a></li>
                            <li><a href="thuonghieuid.php?idthuonghieu=4">Giày Vans</a></li>
                            <li><a href="thuonghieuid.php?idthuonghieu=3">Giày Balentiaga</a></li>
                        </ul>
                    </div>
                    <div class="footer_main_bottom_item">
                        <h4>Chăm sóc khách hàng</h4>
                        <ul>
                            <li><a href="huongdanmuahang.php">Hướng dẫn mua hàng</a></li>
                            <li><a href="#">Cách chọn size giày</a></li>
                            <li><a href="#">Vận chuyển hàng</a></li>
                            <li><a href="#">Đổi trả</a></li>
                        </ul>
                    </div>
                    <div class="footer_main_bottom_item">
                        <h4>Tổng đài hỗ trợ ( Miễn phí )</h4>
                        <ul>
            
                            <li>Mua hàng:<a href="tel:0909099999"> 0909099999</a></li>
                            <li>Bảo hành:<a href="tel:0968988888"> 0968988888</a></li>
                            <li>Khiếu nại<a href="tel:0125677777"> 0125677777</a></li>
                            <li>Đổi trả:<a href="tel:0919966666"> 0919966666</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer_main_bottom_bottom">
                    <div class="footer_main_bottom_bottom_center">
            
                        <h4>Bản quyền thuộc về Sneaker - Thực hiện bởi Lê Đức Sang</h4>
                    </div>
                </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script>
    $(document).ready(function(){
        $(window).scroll(function(){
            if($(this).scrollTop()){
                $('.header_top').addClass('sticky');
            } else {
                $('.header_top').removeClass('sticky');
            }
        });
    });
    window.onscroll = function() {myFunction()};
    /// sticky__menu
    let thuonghieu = document.querySelector(".thuonghieu ");
    let sticky = thuonghieu.offsetTop;
    function myFunction() {
    if (window.pageYOffset >= sticky) {
        thuonghieu.classList.add("sticky");
    } else {
        thuonghieu.classList.remove("sticky");
    }


    // let scroll_top = document.querySelector(".back_top");
    // if(document.documentElement.scrollTop  > 70){
    //     scroll_top.style.display = "flex";
    // }else{
    //     scroll_top.style.display = "none";
    // }
    // scroll_top.addEventListener('click', function(){
    //     document.documentElement.scrollTop = 0;
    // });
    }
    
</script>
<script>
	$(".product_mota_chitiet_bottom_button").click(function(){
   $(this).toggleClass("active");
  $(".product_mota_chitiet_content_dulieu").toggleClass("active");
  
  if($(".product_mota_chitiet_bottom_button").hasClass("active")){
    $(".toggle_text").text("Thu gọn");
  }
  else{
    $(".toggle_text").text("Xem thêm");
  }
});
$('.product_mota_chitiet_bottom_button').click(function(){
    $('.product_mota_chitiet_content_gradient').toggleClass("show");
   
  });
</script>
<script>
    var btn_open = document.querySelector('.btn_open')
    var modal = document.querySelector('.modal')
    var icon_close = document.querySelector('.modal__header i')
   
   
    
    function toggleModal(){
        modal.classList.toggle('hide')
    }
    
    btn_open.addEventListener('click', toggleModal)
    icon_close.addEventListener('click', toggleModal)
    
    
    

</script>

<script>
    var btn_open_search = document.querySelector('.btn_open_search')
    var modal_search = document.querySelector('.modal_search')
    // var icon_close = document.querySelector('.modal__header i')
   
   
    
    function toggleModal(){
        modal_search.classList.toggle('hide')
    }
    
    btn_open_search.addEventListener('click', toggleModal)
    // icon_close.addEventListener('click', toggleModal)
    
    $('.btn_open_search i').click(function(){
    $(this).toggleClass("click");
  });
    
</script>


<script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="js/app.js"></script>
    <script src="js/slider_produce.js"></script>
    <script src="js/thuonghieu.js"></script>
    <script src="js/test_main.js"></script>
</body>

</html>