<?php session_start() ?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>

<body>

    <div class="container-fluid" style=" min-height: 580px ">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>Đăng Nhập Quyền Quản Trị Viên</h3>

                </div>
                <?php if (isset($_SESSION['error'])) :  ?>
                    <div class="alert alert-danger" role="alert">
                        error! <?php echo $_SESSION['error'];
                                unset($_SESSION['error']) ?>
                    </div>
                <?php endif ?>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" method="post" id="login_form" enctype="multipart/form-data">
                            <div class="form-gp">
                                <label class="control-label" for="username">Account</label>
                                <input type="text" title="Please enter you username" required="" placeholder="Nhập email" value="" name="account" id="account" class="form-control">
                                <span class="help-block small">Account</span>
                            </div>
                            <div class="form-gp">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="********" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Password</span>
                            </div>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>

    </div>
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
                    url: "http://localhost:8080/api/login_admin.php",
                    type: "POST",
                    crossDomain: true,
                    contentType: 'application/json; charset=utf-8',
                    dataType: 'json',

                    data: form_data,
                    success: function(result) {
                        console.log(result);
                        

                        // store jwt to cookie
                        //setCookie("jwt", result.jwt, 1);
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
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>