<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
    <!-- Bootstrap 4 CSS and custom CSS -->
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

    <!-- container -->
    <main role="main" class="container starter-template">

        <div class="row">
            <div class="col">
                <div id="content"></div>
            </div>
        </div>
    </main>
    <!-- /container -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="" method="post" enctype="multipart/form-data" id="login_form">
                    <div id="response"></div>

                    <div class="login-form-head">
                        <h4>Sign In</h4>
                        <p>Hello there, Sign in and start managing your Admin Template</p>
                    </div>

                    

                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Account</label>
                            <input type="text" id="exampleInputEmail1" name="Account" required minlength="3">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="password" required minlength="8">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember
                                        Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="./reset-pass.html">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Bạn chưa có tài khoản? Đăng kí tại đây<a href="./register.php">Sign
                                    up</a></p>
                            <p class="text-muted"> <a href="/TTT/admin/modules/admins/login.php">Đăng nhập với tư cách
                                    admin?</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
    <!-- jquery latest version -->
    <!-- jQuery & Bootstrap 4 JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
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
                    url: "http://d39e63958afa.ngrok.io/api/login.php",
                    type: "POST",


                    data: form_data,


                    crossDomain: true,
                    contentType: 'application/json; charset=utf-8',
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        // store jwt to cookie
                        setCookie("jwt", result.jwt, 1);
                        location.href = 'http://localhost:8080/TTT/public/index.php';
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