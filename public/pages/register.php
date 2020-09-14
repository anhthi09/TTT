<?php require_once __DIR__ . "/../../autoload/autoload.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('location: login.php');
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign up - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="" method="post" enctype="multipart/form-data" id="USadd">
                    <div class="login-form-head">
                        <h4>Sign up</h4>
                        <p>Xin chào, mời bạn đăng kí tài khoản</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputName1">Full Name</label>
                            <input type="text" id="exampleInputName1" name="name" required minlength="3">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="exampleInputEmail1" name="email" required>
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                                <label for="exampleInputEmail1">Phone</label>
                                <input
                               type="text" name="phone" pattern="(\+84|0)\d{9,10}"   title="Nhập số điện thoại từ 10 đến 11 số" required
                                 />
                                <i class="ti-mobile"></i>
                                <div class="text-danger"></div>
                            </div>
                       
                        <div class="form-gp">
                                <label for="exampleInputEmail1">address</label>
                                <input type="text" id="exampleInputPhone" name="address" required>
                                <i class="ti-home"></i>
                                <div class="text-danger"></div>
                            </div>
                        <div class="form-gp">
                                <label for="exampleInputEmail1">Account</label>
                                <input type="text" id="exampleInputPhone" name="account" required>
                                <i class="ti-id-badge"></i>
                                <div class="text-danger"></div>
                            </div>
                        <div class="form-gp">
                            
                            <label for="exampleInputPassword11">Password</label>
                            <input type="password" id="exampleInputPassword11" name="password1" required minlength="8">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword22">Confirm Password</label>
                            <input type="password" id="exampleInputPassword22" name="password2" required >
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh Đại Diện</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="Hinh" required>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                            <div class="login-other row mt-4">
                                <div class="col-6">
                                    <a class="fb-login" href="#">Sign up with <i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="col-6">
                                    <a class="google-login" href="#">Sign up with <i class="fa fa-google"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted"> Have an account? <a href="./login.php">Sign in</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
if(@$_FILES['Hinh']['error'] == 0){
    if(move_uploaded_file(@$_FILES['Hinh']["tmp_name"], "../../admin/modules/users/img_users/".@$_FILES['Hinh']["name"]))
        {
            $sql = "INSERT INTO `users` (`id`, `name`, `email`,`address`,  `phone`,`Account`, `password`, `avatar`, `status`,`token`,`created_at`, `updata_up`) 
            VALUES (NULL, '{$_REQUEST['name']}', '{$_REQUEST['email']}','{$_REQUEST['address']}', '{$_REQUEST['phone']}', '{$_REQUEST['account']}','{$_REQUEST['password1']}','{$_FILES['Hinh']['name']}',  '1','1', current_timestamp() , current_timestamp())";
            echo $sql;
            DataProvider::ExecuteQuery($sql);
		}
}
?>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>