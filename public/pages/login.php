
<?php session_start ();
 require_once __DIR__ . "/../../autoload/autoload.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    //   header('location: http://localhost:8080/TTT/public');
    $sql=  "SELECT * FROM `users` WHERE `Account` LIKE  '{$_POST['account']}' AND `password` LIKE '{$_POST['password']}' "; 
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
   
    if($row != NULL){
        $_SESSION['name']= $row['name'];
        $_SESSION['id']= $row['id'];
        echo "<script>  location.href=' ../index.php'   </script>";
    }
    else {
        $_SESSION['error']= "Đăng Nhập Thất Bại";
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
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
                        <h4 style="font-size:40px ;color:rgb(214, 93, 37)">ĐĂNG NHẬP</h4>
                        <p style="letter-spacing: 2px;">Chào Mừng bạn đến với Venus Furniture,<br><br> Mời bạn đăng nhập để mua sắm</p>
                    </div>
                  
                    <?php if (isset($_SESSION['error'])):  ?>
                    <div class="alert alert-danger" role="alert">
                            error! <?php echo $_SESSION['error']; unset ($_SESSION['error']) ?>
                    </div>  
                    <?php endif ?>    

                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Tài Khoản *</label>
                            <input type="text" id="exampleInputEmail1" name="account" required minlength="3">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Mật khẩu *</label>
                            <input type="password" id="exampleInputPassword1" name="password" required minlength="8">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Lưu Đăng Nhập</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="./reset-pass.html">Quên Mật Khẩu?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" style="background-color:rgb(214, 93, 37);color:black">ĐĂNG NHẬP <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Bạn chưa có tài khoản? Đăng kí tại đây<a href="./register.php">ĐĂNG KÍ</a></p>
                            <p class="text-muted" > <a href="/TTT/admin/modules/admins/login.php" style="color:rgb(214, 93, 37)">Đăng nhập với tư cách admin?</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    <script>
        // jQuery codes
        // trigger when login form is submitted
        $(document).ready(function() {
            $(document).on('submit', '#login_form', function() {

                // get form data
                var login_form = $(this);
                var form_data = JSON.stringify(login_form.serializeObject());

                // submit form data to api
                $.ajax({
                    url: "http://localhost:8080/api/login.php",
                    type: "POST",


                    data: form_data,


                    crossDomain: true,
                    contentType: 'application/json; charset=utf-8',
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)

                        // store jwt to cookie
                        setCookie("jwt", result.jwt, 1);

                        // show home page & tell the user it was a successful login



                    },
                    error: function(xhr, resp, text) {
                        // on error, tell the user login has failed & empty the input boxes
                        $('#response').html(
                            "<div class='alert alert-danger'>Login failed. Email or password is incorrect.</div>"
                        );
                        login_form.find('input').val('');
                    }
                });

                return false;
            });

        });


        // if the user is logged in
        function showLoggedInMenu() {
            // hide login and sign up from navbar & show logout button
            $("#login, #sign_up").hide();
            $("#logout").show();
        }

        function showUpdateAccountForm() {
            // validate jwt to verify access
            var jwt = getCookie('jwt');
            $.post("api/validate_token.php", JSON.stringify({
                jwt: jwt
            })).done(function(result) {

                // if response is valid, put user details in the form


            })

            // on error/fail, tell the user he needs to login to show the account page
        }


        // function to make form values to json format
        $.fn.serializeObject = function() {

            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };
    </script>
</body>

</html>