<?php session_start();

require_once __DIR__ . "/../autoload/autoload.php"; ?>
<!DOCTYPE html>
<html>

<head>

    <title>Venus Furniture| Đồ Nội Thất Đẹp | Nội Thất Hiện Đại </title>
    <link rel="shortcut icon" type="image/x-icon" href="/TTT/public/admin/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./vendors/fonts/css/fontawesome.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/redirect?Id=CvmsVv9asuSiOaRBBz9urpS909ixNzNqI37%2b8O1yQr4%3d">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css">
    <link rel="stylesheet" href="vendors/css/bootstrap.css">
    <link rel="stylesheet" href="resources/css/queries.css">
    <link rel="stylesheet" href="vendors/css/bootstrap-grid.css">
    <link rel="stylesheet" href="vendors/css/magnific-popup.css">
    <script src="./vendors/js/jquery-3.5.0.js"></script>

    
    <script src="https://kit.fontawesome.com/973a1060ee.js" crossorigin="anonymous"></script>


</head>

<body>

    <header id="Home">
        <!-- Begin head  -->
        <nav>

        <a href="#Home"><img class="logo" src="./resources/img/hinh/logo2.png" alt="logo"></a>
            <div>
            <ul class="main-nav" >
                    <li class="mn" id="danhmuc">
                        
                    </li>
                    <script>
                            var requestUrl = 'http://localhost:8080/api/api/type/read.php';
                            
                            fetch(requestUrl, {
                                    method: "get"
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log(data.data.records);
                                    document.getElementById("danhmuc").innerHTML = '';
                                    
                                    var content = ``;
                                    data.data.records.forEach(element => {
                                        content += `<a class="a" href="/TTT/public/pages/show-row.php?id=${element.category} "> </a> &#160;
        
                                        <ul class="submenu">
                                        <li><a href="/TTT/public/pages/show-row.php?id=${element.id}"> ${element.name}</a></li>
                                        </ul>
                                        </li>
                                        `
                                                       
                                    });
                                    document.getElementById("danhmuc").innerHTML = content;
                                    
                                });
                                
                                
                    </script>
                    

                    <a class="fas fa-shopping-cart " href="pages/gio-hang.php" id="icoi"></a>
                   <?php if (isset($_SESSION['name'])) :   ?>

                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <?php echo $_SESSION['name'] ?>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="pages/don-hang.php">Đơn hàng</a>
                                <a class="dropdown-item" href="#"></a>
                                <a class="dropdown-item" href="pages/ho-so.php">Hồ sơ</a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/TTT/public/pages/thoat.php">Đăng xuất</a>
                            </div>
                        </div>
                    <?php else : ?>

                        <a class="far fa-user " href="pages/login.php" id="icoi"></a>

                    <?php endif ?>

                </ul>
                
                         <ul class="submenu"></ul>
                    </li>
            </div>
            <div class="mobile-nav-icon"><i class="fa fa-bars "></i></div>
        </nav>
        

        <div class="clearfix"> </div>
        <div class="ROW">
            <div class="heading-main-box">
               
            </div>
        </div>
        <!-- end head -->
    </header>
    <section class="About-section row ">
        <!-- Bắt đầu phần giới thiệu sản phẩm mới -->
        <div class="bosuutap col span_1_of_2 ">
           
            <p class="tieude">Venus Furniture<br></p>
            <p class="gioithieu">
            Việc ra đời của Venus Furniture là cả quá trình đúc kết, tìm hiểu về đặc thù của từng loại không gian và các xu hướng sở thích khác nhau từ người sử dụng. 
            Những nghiên cứu kỹ lưỡng đó được kết hợp khéo léo cùng tài năng của các nhà thiết kế nổi tiếng Châu Âu, tạo nên dòng sản phẩm trang trí, đồ nội thất đẹp có độ ứng dụng cao với nhiều loại hình không gian khác nhau. 
            <br>Gần gũi và ấm cúng cho nhà ở; cởi mở và thời trang cho khách sạn; chuyên nghiệp, năng động khi sử dụng cho văn phòng... 
            phong thái từ các thiết kế của Venus Furniture luôn tạo được sức hút bởi tính đa chiều trong cảm xúc mà chúng mang lại cho không gian.
            Venus Furniture luôn sẵn sàng mang đến những sản phẩm đồ nội thất đẹp giúp bạn tạo ra những không gian sống tiện nghi, 
            thoải mái .
            </p>
           
        </div>
        <div id="slider" class="gioithieuimg col span-1_of_2 popup-gallery">
            <a href="./resources/img/hinh/banghe.jpeg" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hinh/banghe.jpeg" alt="photo" stt="0"></a>
            <a href="./resources/img/hinh/nen.jpeg" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hinh/nen.jpeg" alt="photo" stt="1" style="display:none"></a>
            <a href="./resources/img/hinh/nen1.jpeg" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hinh/nen1.jpeg" alt="photo" stt="2" style="display:none"></a>
            <a href="./resources/img/hinh/nen2.jpeg" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hinh/nen2.jpeg" alt="photo" stt="3" style="display:none"></a>
            <a href="./resources/img/hinh/nen3.jpeg" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hinh/nen3.jpeg" alt="photo" stt="4" style="display:none"></a>
            <a href="./resources/img/hinh/nen4.jpeg" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hinh/nen4.jpeg" alt="photo" stt="5" style="display:none"></a>
            <a href="./resources/img/hinh/nen5.jpeg" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hinh/nen5.jpeg" alt="photo" stt="6" style="display:none"></a>

        </div>
        <!-- kết thúc phần giới thiệu sản phẩm mới -->
    </section>

    <section class="products-section container-fluid">
    <div class="row colum">
            <div class="col span_1_of_4 about-picture">
                <img src="./resources/img/hinh/Sofa.jpeg" alt="activities1">
                <p class="picture-title"> Sofa</p>
            </div>
            <div class="col span_1_of_4 about-picture">
                <img src="./resources/img/hinh/Ghế.jpeg" alt="activities2">
                <p class="picture-title">Ghế</p>
            </div>
            <div class="col span_1_of_4 about-picture">
                <img src="./resources/img/hinh/Bàn.jpeg" alt="activities3">
                <p class="picture-title">Bàn</p>
            </div>
            <div class="col span_1_of_4 about-picture">
                <img src="./resources/img/hinh/Giường.jpeg" alt="activities4">
                <p class="picture-title">Giường</p>
            </div>
        </div>
</section>              

    <section id="water" class="advertisement-section row">
        <!-- Bắt đầu giới thiệu về thương hiệu -->
        <div class="col md-6 popup-gallery ">
            <a href="./resources/img/hinh/bia.jpeg" title="#"><img class="advertisement-section-img" src="./resources/img/hinh/bia.jpeg" alt="photo" st="0"> </a>
            <a href="./resources/img/hinh/bia1.jpg" title="sản phẩm mới nhất của bộ sưu tập"><img class="advertisement-section-img" src="./resources/img/hinh/bia1.jpg" alt="poto" st="1" style="display:none"> </a>
            <a href="./resources/img/hinh/bia2.jpg" title="sản phẩm mới nhất của bộ sưu tập"><img class="advertisement-section-img" src="./resources/img/hinh/bia2.jpg" alt="poto" st="2" style="display:none"> </a>
            <a href="./resources/img/hinh/bia3.jpg" title="sản phẩm mới nhất của bộ sưu tập"><img class="advertisement-section-img" src="./resources/img/hinh/bia3.jpg" alt="poto" st="3" style="display:none"> </a>
            <a href="./resources/img/hinh/bia4.jpg" title="sản phẩm mới nhất của bộ sưu tập"><img class="advertisement-section-img" src="./resources/img/hinh/bia4.jpg" alt="poto" st="4" style="display:none"> </a>
            <a href="./resources/img/hinh/bia5.jpg" title="sản phẩm mới nhất của bộ sưu tập"><img class="advertisement-section-img" src="./resources/img/hinh/bia5.jpg" alt="poto" st="5" style="display:none"> </a>
        

        </div>

        <div class="noidung col md-6 ">
            <p class="tieude2">Không Gian Sống...<br></p>
            <p class="modau">Tất cả những gì cần cho ngôi nhà của bạn</p>
            <p class="gioithieu ">
            Đất nước Đan Mạch ghi dấu trong mọi lĩnh vực từ nghệ thuật, kiến trúc, khoa học công nghệ, bề dày lịch sử cho đến phúc lợi xã hội. 
            Những thành tựu đó đã tạo nên nền tảng vững chắc để đảm bảo cho nhịp sống thanh bình, biết trân trọng các giá trị chân thực và luôn sáng tạo để mang đến những điều tốt đẹp cho cuộc sống. 
            Đặc biệt hơn nữa, yếu tố tinh thần này luôn thể hiện rõ nét trong từng góc sống, từng tổ ấm của người dân nơi đây.
            <br>Với tình yêu đặc biệt dành cho nội thất, đến với Venus Furniture là đến với một tinh thần Đan Mạch chân thực, đồng thời trải nghiệm về các không gian sống mang đậm chất Bắc Âu phóng khoáng mà đơn giản, tối giản mà hữu dụng.
            Hãy để chúng tôi đồng hành cùng bạn tạo nên một không gian sống chứa đựng những ký ức tuyệt vời nhất.
            <br> 
            </p>
        </div>
        <!-- Kết thúc giới thiệu thương hiệu -->
    </section>
    <section class="products-section container-fluid">
    <div class="row colum">
            <div class="col span_1_of_4 about-picture">
                
               
                
                <h4 class="tieude3" style="text-align:center">VỀ CHÚNG TÔI</h4>
                <p class="gioithieu " >Venus Furniture cung cấp đồ nội thất đặt làm chất lượng cao cấp nhằm tôn vinh 
                    và phản ánh nét độc đáo của các khách sạn nổi tiếng trên toàn thế giới.</p>
                    <img class ="anh" src="./resources/img/hinh/vechungtoi.jpg">
                    
            </div>
            <div class="col span_1_of_4 about-picture">
            
                <h4 class="tieude3" style="text-align:center">DỰ ÁN</h4>
                <p p class="gioithieu ">Venus Furniture tự hào về đồ nội thất mà chúng tôi sản xuất cũng như đối với những khách sạn mà chúng tôi làm việc. 
                    Từ dịch vụ đầy đủ đến bất động sản sang trọng, kinh nghiệm của chúng tôi bao gồm các dự án từ 25 đến 4.000 phòng.</p>
                    <img class ="anh" src="./resources/img/hinh/quatrinh.jpg">
            </div>
            <div class="col span_1_of_4 about-picture">
                
                <h4 class="tieude3" style="text-align:center">QUÁ TRÌNH</h4>
                <p p class="gioithieu ">Hệ thống của Fleetwood và đội ngũ nhân viên giàu kinh nghiệm mang đến cho 
                    khách hàng sự đảm bảo rằng các dự án của họ sẽ được xử lý liền mạch và chuyên nghiệp, 
                    hoàn thành các mục tiêu thiết kế của họ.</p>
                    <img class ="anh" src="./resources/img/hinh/duan.jpg">
            </div>
            <div class="col span_1_of_4 about-picture">
            
                <h4 class="tieude3" style="text-align:center">CATALOGUE</h4>
                <p p class="gioithieu ">Với tình yêu đặc biệt dành cho nội thất, đến với AConcept là đến với một tinh thần Đan Mạch chân thực, 
                    đồng thời trải nghiệm về các không gian sống mang đậm chất Bắc Âu phóng khoáng mà đơn giản, tối giản mà hữu dụng. 
                    </p>
                    <img class ="anh" src="./resources/img/hinh/catoluge.jpg">
            </div>
            
        </div>
</section>              

    <section class="video ">
        <!-- Bắt đầu video quảng cáo -->
        <wix-video data-video-info="{&quot;fittingType&quot;:&quot;fill&quot;,&quot;alignType&quot;:&quot;center&quot;,&quot;hasBgScrollEffect&quot;:true,&quot;staticVideoUrl&quot;:&quot;https://video.wixstatic.com/&quot;,&quot;videoId&quot;:&quot;beda79_a5a530d7297146d8a81a8b666796bf64&quot;,&quot;playbackRate&quot;:1,&quot;playerType&quot;:&quot;html5&quot;,&quot;isVideoDataExists&quot;:&quot;1&quot;,&quot;videoWidth&quot;:1920,&quot;videoHeight&quot;:1080,&quot;qualities&quot;:[{&quot;quality&quot;:&quot;480p&quot;,&quot;size&quot;:409920,&quot;url&quot;:&quot;video/beda79_a5a530d7297146d8a81a8b666796bf64/480p/mp4/file.mp4&quot;},{&quot;quality&quot;:&quot;720p&quot;,&quot;size&quot;:921600,&quot;url&quot;:&quot;video/beda79_a5a530d7297146d8a81a8b666796bf64/720p/mp4/file.mp4&quot;},{&quot;quality&quot;:&quot;1080p&quot;,&quot;size&quot;:2073600,&quot;url&quot;:&quot;video/beda79_a5a530d7297146d8a81a8b666796bf64/1080p/mp4/file.mp4&quot;}],&quot;videoFormat&quot;:&quot;mp4&quot;,&quot;autoPlay&quot;:true,&quot;isEditorMode&quot;:false,&quot;isViewerMode&quot;:true,&quot;containerId&quot;:&quot;comp-k7bm6onr&quot;}" id="comp-k7bm6onrbalatamediavideo" class="bgVideo"><video role="presentation" preload="auto" playsinline="" crossorigin="anonymous" loop="" muted="" id="comp-k7bm6onrbalatamediavideovideo" class="bgVideovideo" width="100%" height="100%" autoplay="" src="./resources/img/video.mp4"></video>

        </wix-video>
        </div>
        <!-- Kết thúc video quảng cáo -->
    </section>

    <section class="contact-section">
        <!-- Bắt đầu phần kết nối với người dùng -->
        <div class=" contact">
            <ul class="infomation">
                <li><i class="fas fa-map-marked-alt small-icon"> </i> Address: 208 Nguyễn Hữu Cảnh,  

                    Quận Bình Thạnh, TP. HCM</li>

                <li><i class="fas fa-envelope small-icon"> </i> Email: info@venusfurniture.com</li>
                <li><i class="fas fa-phone small-icon"> </i> Tel: 0388.05.4795 / 0989.881171</li>
            </ul>
            <ul class="social-icons">

                <li id="icon1"><a href="https://www.facebook.com/hoouzy/" class="fab fa-facebook"></a></li>
                <li id="icon2"><a href="#" class="fab fa-twitter icon2"></a></li>
                <li id="icon3"><a href="https://www.instagram.com/hoouzy.home/" class="fab fa-instagram icon3"></a></li>
                <li id="icon4"><a href="#" class="fab fa-google-plus-square icon4"></a></li>
            </ul>
        </div>
        <div>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.216972900971!2d106.71955221474913!3d10.794687392309159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175290261c32643%3A0x496f4006b42b3b58!2sLandmark%2081%20skyview!5e0!3m2!1svi!2sus!4v1600856563176!5m2!1svi!2sus" width="700px" height="350px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <!-- Kết thúc phần kết nối người dùng -->
    </section>

    <footer>
        <!-- Begin footer -->
        <div class="splitter"></div>
        <ul>
            <!-- three footer columns are here -->
            <li>
        
        <div class="text">
            <h4>LIÊN HỆ VỚI CHÚNG TÔI</h4>
            <div>1.Đặt hàng trực tuyến (8h-21h)
                   <br>  1900 63 64 76 (Phím 1)
                    <br> <a href="/TTT/public/index.php">webshop@venus.vn</a>
                    <br>2. CSKH (8h-17h)
                    <br> 1900 63 64 76 (Phím 2)
                    <br> <a href="#">cskh@venus.vn</a>
 
        </div>
    </li>
    <li>
        
        <div class="text">
            <h4>KHUYẾN MÃI</h4>
            <div>
                 <a href="#">Sản Phẩm Khuyến Mãi</a><br><br>
                 <a href="#">Tin Tức Khuyến Mãi</a><br>
                </div>
        </div>
    </li>
    <li>
        
        <div class="text">
            <h4>DỊCH VỤ KHÁCH HÀNG</h4>
            <div>
                 <a href="#">CLB Khách Hàng Thân Thiết</a><br>
                 <a href="#">Thanh Toán</a><br>
                 <a href="#">Đổi Hàng</a><br>
                 <a href="#">Vận Chuyển Và Lắp Đặt</a><br>
                 <a href="#">Bảo Hành Và Bảo Trì</a><br>
                 <a href="#">Bảo Mật Thông Tin</a><br>
            </div>
        </div>
    </li>
        </ul>
 
        <div class="bar">
            <div class="bar-wrap">
                <ul class="links"> <!-- footer menu -->
                    <li><a href="#">Trang Chủ</a></li>
                    <li><a href="#">Dịch Vụ Khách Hàng</a></li>
                    <li><a href="#">Chính Sách</a></li>
                    <li><a href="#">Tuyển Dụng</a></li>
                    <li><a href="#">Hỏi Đáp</a></li>
                </ul>
                
                <div class="copyright">&copy;  2020 VENUS FURNITURE</div>
            </div>
        </div>
        <!-- end footer -->
    </footer>

    <!-- khác -->
    <!-- Bắt đầu hộp thoại tin nhắn  -->
    <div class="messenger row">
        <a href="#" id="messenger" class="fas fa-comment-dots"></a>
    </div>
    <!-- kết thúc hộp thoại tin nhắn -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="vendors/js/bootstrap.js"></script>
    <script src="vendors/js/jquery.waypoints.min.js"></script>


    <script src="vendors/js/jquery.magnific-popup.min.js"></script>
    <script src="vendors/js/jquery.magnific-popup.js"></script>
    <script src="resources/js/scripts.js"></script>
</body>

</html>


