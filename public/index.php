<?php session_start();

require_once __DIR__ . "/../autoload/autoload.php"; ?>
<!DOCTYPE html>
<html>

<head>

    <title>Nội thất| Ngoại thất và Decor| Hàng xuất khẩu cao cấp</title>

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

            <a href="#Home"><img class="logo" src="./resources/img/logoCong_ty_Co_Phan_Kien_Truc_Xay_Dung_song_phat.jpg.png" alt="logo"></a>
            <div>
                <ul class="main-nav">
                    <?php
                    $sql = "SELECT * FROM `category`";
                    $category = DataProvider::ExecuteQuery($sql);
                    while ($loai = mysqli_fetch_array($category)) {

                        $chuoi = <<< EOD
                          <li><a class="a" href="/DoAnWeb2020/public/pages/show-row.php?id={$loai['id']}">  {$loai['name']}</a>
                          <ul class="submenu">
                          EOD;
                        echo $chuoi;

                        $sql1 = "SELECT * FROM `type` WHERE `category` = {$loai['id']}";
                        $type = DataProvider::ExecuteQuery("$sql1");

                        while ($type1 = mysqli_fetch_array($type)) {
                            $chuoi1 = <<< EOD
                      
                            <li><a href="/DoAnWeb2020/public/pages/show-row.php?id={$type1['id']}"> {$type1['name']}</a></li>                                                                                  
                     EOD;
                            echo $chuoi1;
                        }
                        echo " </ul>";
                    }
                    echo   "</li>";
                    ?>
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
                                <a class="dropdown-item" href="/DoAnWeb2020/public/pages/thoat.php">Đăng xuất</a>
                            </div>
                        </div>
                    <?php else : ?>

                        <a class="far fa-user " href="pages/login.php" id="icoi"></a>

                    <?php endif ?>

                </ul>
            </div>
            <div class="mobile-nav-icon"><i class="fa fa-bars "></i></div>
        </nav>

        <div class="clearfix"> </div>
        <div class="ROW">
            <div class="heading-main-box">
                <h>
                    tiện nghi, sang trọng, <br>
                    đẳng cấp và tinh tế
                </h>
            </div>
        </div>
        <!-- end head -->
    </header>

    <section class="About-section row ">
        <!-- Bắt đầu phần giới thiệu sản phẩm mới -->
        <div class="bosuutap col span_1_of_2">
            <p class="tieude">2020 Collection<br></p>
            <p class="gioithieu">
                Bộ sưu tập các sản phẩm ngoài trời lớn nhất Việt Nam.-
                Được sản xuất với công nghệ và chất lượng tốt nhất, phù hợp sử dụng trong mọi điều kiện thời tiết;
                từ ban công có mái che, khu vườn vùng nhiệt đới, khu vực Bắc Âu lạnh giá khắc nghiệt
                cho tới những vùng biển Địa Trung Hải nắng nóng,
                các sản phẩm ngoài trời của chúng tôi đều thích hợp sử dụng
            </p>
        </div>


        <div id="slider" class="gioithieuimg col span-1_of_2 popup-gallery">
            <a href="./resources/img/hình trang chủ/ghế 2.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hình trang chủ/ghế 2.webp" alt="photo" stt="1" style="display:none"></a>
            <a href="./resources/img/hình trang chủ/ghế 1.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hình trang chủ/ghế 1.webp" alt="photo" stt="0"></a>
            <a href="./resources/img/hình trang chủ/ghế 3.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hình trang chủ/ghế 3.webp" alt="photo" stt="2" style="display:none"></a>
            <a href="./resources/img/hình trang chủ/ghế 4.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hình trang chủ/ghế 4.webp" alt="photo" stt="3" style="display:none"></a>
            <a href="./resources/img/hình trang chủ/ghế 5.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hình trang chủ/ghế 5.webp" alt="photo" stt="4" style="display:none"></a>
            <a href="./resources/img/hình trang chủ/ghế 6.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hình trang chủ/ghế 6.webp" alt="photo" stt="5" style="display:none"></a>
            <a href="./resources/img/hình trang chủ/ghế 7.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hình trang chủ/ghế 7.webp" alt="photo" stt="6" style="display:none"></a>
            <a href="./resources/img/hình trang chủ/ghế 8.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="slide" src="./resources/img/hình trang chủ/ghế 8.webp" alt="photo" stt="7" style="display:none"></a>
        </div>
        <!-- kết thúc phần giới thiệu sản phẩm mới -->
    </section>

    <section class="products-section container-fluid ">
        <!-- Bắt đầu phần phân loại sản phẩm -->
        <div class="row colum">
            <div class="col md-6 about-picture">

                <a href="pages/show-row.php?id=71"><img src="./resources/img/1.webp" alt="photo"></a>
                <p class="picture-title"> Ngoại Thất</p>
            </div>
            <div class="col md-6 about-picture">

                <a href="pages/show-row.php?id=9"> <img style="height: 100%;" src="./resources/img/soddfa.webp" alt="photo"></a>
                <p href="#" class="picture-title"> Sofa</p>
            </div>
        </div>

        <div class="row colum">
            <div class="col md about-picture">

                <a href="pages/show-row.php?id=26"> <img src="./resources/img/chaucay.webp" alt="photo"></a>
                <p class=" picture-title "> Chậu Cây</p>
            </div>
            <div class="col md-4 about-picture">

                <a href="pages/show-row.php?id=17"> <img src="./resources/img/banghe.webp" alt="photo"></a>
                <p class="picture-title"> Bàn ghế</p>
            </div>
            <div class="col md-4 about-picture">

                <a href="pages/show-row.php?id=72"> <img src="./resources/img/decor.webp" alt="photo"></a>
                <p class="picture-title"> Trang trí</p>
            </div>
        </div>
        <!-- Kết thúc phân loại sản phẩm -->
    </section>

    <section id="water" class="advertisement-section row">
        <!-- Bắt đầu giới thiệu về thương hiệu -->
        <div class="col md-6 popup-gallery ">
            <a href="./resources/img/gt.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="advertisement-section-img" src="./resources/img/gt.webp" alt="poto" st="0"> </a>
            <a href="./resources/img/hình trang chủ/thác nước 1.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="advertisement-section-img" src="./resources/img/hình trang chủ/thác nước 1.webp" alt="poto" st="1" style="display:none"> </a>
            <a href="./resources/img/hình trang chủ/thác nước 2.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="advertisement-section-img" src="./resources/img/hình trang chủ/thác nước 2.webp" alt="poto" st="2" style="display:none"> </a>
            <a href="./resources/img/hình trang chủ/thác nước 3.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="advertisement-section-img" src="./resources/img/hình trang chủ/thác nước 3.webp" alt="poto" st="3" style="display:none"> </a>
            <a href="./resources/img/hình trang chủ/thác nước 4.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="advertisement-section-img" src="./resources/img/hình trang chủ/thác nước 4.webp" alt="poto" st="4" style="display:none"> </a>
            <a href="./resources/img/hình trang chủ/thác nước 5.webp" title="sản phẩm mới nhất của bộ sưu tập"><img class="advertisement-section-img" src="./resources/img/hình trang chủ/thác nước 5.webp" alt="poto" st="5" style="display:none"> </a>

        </div>

        <div class="noidung col md-6 ">
            <p class="tieude2">Made in Viet Nam ...<br></p>
            <p class="modau">Tất cả những gì cần cho ngôi nhà của bạn</p>
            <p class="gioithieu2 ">
                Là một trong 4 nước xuất khẩu lớn nhất Thế giới về Nội thất, Ngoại thất và Home decor, Việt Nam có khả
                năng sản xuất số lượng lớn sản phẩm Nội Ngoại thất với độ phức tạp cũng như yêu cầu khắt khe nhất và có
                thể đáp ứng được nhu cầu của bất cứ thị trường nào trên Thế giới ...<br><br>
                ​Với mô hình phân phối hàng trực tiếp từ Nhà máy tới người dùng cuối thông qua nền tảng bán hàng Online
                và chỉ phân phối các sản phẩm của các Thương hiệu uy tín; chúng tôi không ngừng tìm kiếm các nguồn hàng
                sản xuất tại Việt Nam với chất lượng tốt nhất để mang tới cho người tiêu dùng.<br><br>
                Đặt hàng trực tiếp với Nhà máy khi có đơn hàng, không đầu tư Showroom lớn, không trữ hàng như hình thức
                bán hàng showroom truyền thống, vì vậy mỗi sản phẩm tới tay người tiêu dùng đều là những sản phẩm còn
                nguyên đai nguyên kiện và đã loại bỏ được rất nhiều chi phí trung gian, giúp người tiêu dùng tiếp cận
                được với những sản phẩm chất lượng của các Thương hiệu lớn trên thế giới với giá cả hợp lý nhất
            </p>
        </div>
        <!-- Kết thúc giới thiệu thương hiệu -->
    </section>

    <section class="video ">
        <!-- Bắt đầu video quảng cáo -->
        <wix-video data-video-info="{&quot;fittingType&quot;:&quot;fill&quot;,&quot;alignType&quot;:&quot;center&quot;,&quot;hasBgScrollEffect&quot;:true,&quot;staticVideoUrl&quot;:&quot;https://video.wixstatic.com/&quot;,&quot;videoId&quot;:&quot;beda79_a5a530d7297146d8a81a8b666796bf64&quot;,&quot;playbackRate&quot;:1,&quot;playerType&quot;:&quot;html5&quot;,&quot;isVideoDataExists&quot;:&quot;1&quot;,&quot;videoWidth&quot;:1920,&quot;videoHeight&quot;:1080,&quot;qualities&quot;:[{&quot;quality&quot;:&quot;480p&quot;,&quot;size&quot;:409920,&quot;url&quot;:&quot;video/beda79_a5a530d7297146d8a81a8b666796bf64/480p/mp4/file.mp4&quot;},{&quot;quality&quot;:&quot;720p&quot;,&quot;size&quot;:921600,&quot;url&quot;:&quot;video/beda79_a5a530d7297146d8a81a8b666796bf64/720p/mp4/file.mp4&quot;},{&quot;quality&quot;:&quot;1080p&quot;,&quot;size&quot;:2073600,&quot;url&quot;:&quot;video/beda79_a5a530d7297146d8a81a8b666796bf64/1080p/mp4/file.mp4&quot;}],&quot;videoFormat&quot;:&quot;mp4&quot;,&quot;autoPlay&quot;:true,&quot;isEditorMode&quot;:false,&quot;isViewerMode&quot;:true,&quot;containerId&quot;:&quot;comp-k7bm6onr&quot;}" id="comp-k7bm6onrbalatamediavideo" class="bgVideo"><video role="presentation" preload="auto" playsinline="" crossorigin="anonymous" loop="" muted="" id="comp-k7bm6onrbalatamediavideovideo" class="bgVideovideo" width="100%" height="100%" autoplay="" src="https://video.wixstatic.com/video/beda79_a5a530d7297146d8a81a8b666796bf64/1080p/mp4/file.mp4"></video>

        </wix-video>
        </div>
        <!-- Kết thúc video quảng cáo -->
    </section>

    <section class="contact-section">
        <!-- Bắt đầu phần kết nối với người dùng -->
        <div class=" contact">
            <ul class="infomation">
                <li><i class="fas fa-map-marked-alt small-icon"> </i> Address: Showroom 10 đường B4, KDT SALA

                    Quận 2, TP. HCM</li>

                <li><i class="fas fa-envelope small-icon"> </i> Email: info@hoouzy.com</li>
                <li><i class="fas fa-phone small-icon"> </i> Tel: 0888.05.8338 / 0989.881882</li>
            </ul>
            <ul class="social-icons">

                <li id="icon1"><a href="https://www.facebook.com/hoouzy/" class="fab fa-facebook"></a></li>
                <li id="icon2"><a href="#" class="fab fa-twitter icon2"></a></li>
                <li id="icon3"><a href="https://www.instagram.com/hoouzy.home/" class="fab fa-instagram icon3"></a></li>
                <li id="icon4"><a href="#" class="fab fa-google-plus-square icon4"></a></li>
            </ul>
        </div>
        <div>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.7651222302347!2d106.7229326213425!3d10.770640795970566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3a1f5c247c407f3e!2zS2h1IMSRw7QgdGjhu4sgU2FsYQ!5e0!3m2!1svi!2s!4v1588692530529!5m2!1svi!2s" width="500px" height="350px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <!-- Kết thúc phần kết nối người dùng -->
    </section>

    <footer>
        <!-- Begin footer -->
        <p>
            Copyright &copy; 2020 by TTUTT TEAM
        </p>
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



<!-- demo  -->