<?php 
 session_start();
require_once __DIR__ . "/../autoload/autoload.php";
?>
<!DOCTYPE html>
<html>

<head>

    <title>Nội thất| Ngoại thất và Decor| Hàng xuất khẩu cao cấp</title>

    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/redirect?Id=CvmsVv9asuSiOaRBBz9urpS909ixNzNqI37%2b8O1yQr4%3d">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/973a1060ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../vendors/fonts/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/styles.css">
    <link rel="stylesheet" href="../vendors/css/bootstrap.css">
    <link rel="stylesheet" href="../resources/css/queries.css">
    <link rel="stylesheet" href="../vendors/css/bootstrap-grid.css">
    <script src="../vendors/js/jquery-3.5.0.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <!-- <script src="js/vendor/modernizr-2.8.3.min.js"></script> -->
    <!-- Boottrap gio hang -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   
</head>

<body>
    <!-- Begin head  -->
    <div class="sticky">
        <nav>
            <a href="../index.php"><img class="logo"
                    src="../resources/img/hinh/logo3.png" alt="logo"></a>
            <div>
            <ul class="main-nav">
              <li>
                <form class="form-inline " id="reseach" action="show-row.php" method="get">
             <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn my-2 my-sm-0" type="submit" name="ok" value="search" style="color: white ;background-color:rgb(214, 93, 37);;border-color:#2e6da4">Search</button>
           </form>
           
          </li>
                    <?php
                      if (isset($_REQUEST['ok'])) 
                      {
                          // Gán hàm addslashes để chống sql injection
                          $search = addslashes($_GET['search']);
                        
                          // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
                          if ( empty($search)) {
                              echo "<script> alert ('bạn hãy nhập từ khóa nhé')</script>"; 
                          } 
                          else
                          {
                            
                              // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                              $query = "SELECT * FROM `product` WHERE `name` LIKE '%$search%'"; 
                         
                              $type11 = DataProvider::ExecuteQuery("$query");
                          
                              $type10 = mysqli_fetch_array($type11);        
                            
                            }
                        
                        }
                      ?>                                 
            <li class="mn" id="danhmuc">
                    <ul class="submenu">
                        <li id="loaisp"></li>
                        </ul>
                    </li>
                    <script>
                            var requestUrl = 'http://localhost:8080/api/api/category/read.php';
                            var requestUrl1 = 'http://localhost:8080/api/api/type/read.php';
                            fetch(requestUrl, {
                                    method: "get"
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log(data.data.records);
                                    document.getElementById("danhmuc").innerHTML = '';
                                    
                                    var content = ``;
                                    data.data.records.forEach(element => {
                                        content += `<a class="a" href="/TTT/public/pages/show-row.php?id=${element.id} "> ${element.name}</a> &#160;`
                                                       
                                    });
                                    document.getElementById("danhmuc").innerHTML = content;
                                    
                                });
                                fetch(requestUrl1, {
                                    method: "get"
                                })
                                .then(response => response1.json())
                                .then(data => {
                                    console.log(data.data.records);
                                    document.getElementById("loaisp").innerHTML = '';
                    
                                    var content1 = ``;
                                    data.data.records.forEach(element1 => {
                                        if(element1.category == element.id)
                                        content1 += `<a href="/TTT/public/pages/show-row.php?id=${element1.id} "> ${element1.name}</a>
                                                `
                                                       
                                    });
                                    document.getElementById("loaisp").innerHTML = content1;
                                    
                                });    
                                
                    </script>
                    
                    
                    <a class="fas fa-shopping-cart " href="gio-hang.php" id="icoi"></a>
                    <?php if (isset($_SESSION['name'])) :   ?>

                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <?php echo $_SESSION['name'] ?>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="don-hang.php">Đơn hàng</a>
                                <a class="dropdown-item" href="#"></a>
                                <a class="dropdown-item" href="ho-so.php">Hồ sơ</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/TTT/public/pages/thoat.php">Đăng xuất</a>
                            </div>
                        </div>
                    <?php else : ?>

                        <a class="far fa-user " href="login.php" id="icoi"></a>

                    <?php endif ?>

                </ul>
            </div>
            <div class="mobile-nav-icon"><i class="fa fa-bars "></i></div>
        </nav>
    </div>
    <div class="clearfix"> </div>
    <div id="SITE_HEADER-placeholder"></div>
 