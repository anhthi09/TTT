<?php session_start ()?>
<?php require_once __DIR__ . "/../../autoload/autoload.php"; ?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>


<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    //   header('location: http://localhost:8080/DoAnWeb2020/public');
    $sql=  "SELECT * FROM `admins` WHERE `email` LIKE  '{$_POST['email']}' AND `password` LIKE '{$_POST['password']}' "; 
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
   
    if($row != NULL){
        $_SESSION['namead']= $row['name'];
        $_SESSION['idad']= $row['id'];
        echo "<script>  location.href=' ../index.php'   </script>";
    }
    else {
        $_SESSION['error']= "Đăng Nhập Thất Bại";
    }
}
?>
<body >

<div class="container-fluid" style=" min-height: 580px ">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3>Đăng Nhập Quyền Quản Trị Viên</h3>
                    
                </div>
                <?php if (isset($_SESSION['error'])):  ?>
                    <div class="alert alert-danger" role="alert">
                            error! <?php echo $_SESSION['error']; unset ($_SESSION['error']) ?>
                    </div>  
                    <?php endif ?> 
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="email" id="username" class="form-control">
                                <span class="help-block small">Tài khoảng email đã đăng kí</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">password của bạn</span>
                            </div>
                            
                         
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="#">Register</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
       
    </div>
</body>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>