<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('location: ../index.php');
}
require_once __DIR__ . "/../../layouts/header.php";
require_once __DIR__ . "/../../autoload/autoload.php";

?>
<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h2 class="text-center"> Thông Tin Của Bạn </h2>
                    <form action="" method="post" enctype="multipart/form-data" id="USedit">
                        <?php
                        try {
                            $sql = "SELECT * FROM users";
                            if (isset($_SESSION['id'])) {
                                $id = $_SESSION['id'];
                                $sql .= " WHERE id = " . $id;
                            }
                            $result = DataProvider::ExecuteQuery($sql);
                            $row = mysqli_fetch_array($result);
                        } catch (Exception $ex) {
                            echo "Không thể mở CSDL";
                        }
                        ?>
                        <div class="form-group">
                            <label>Tên User</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="TenUS" value="<?php echo $row['name'] ?>" required minlength="3">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" class="form-control" placeholder="351 Lạc Long Quân-Phường 4- Quận 5- Thành Phố Hồ Chí Minh" name="address" value="<?php echo $row['address'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input
                               type="text"  class="form-control" placeholder="0345197655" name="phone" value="<?php echo $row['phone'] ?>"  pattern="(\+84|0)\d{9,10}"  title="Nhập số điện thoại từ 10 đến 11 số" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="ABC@gmail.com" name="email" value="<?php echo $row['email'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tên Đăng Nhập</label>
                            <input type="text" class="form-control" placeholder="NguyenVanA" name="account" value="<?php echo $row['Account'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="" name="password" value="<?php echo $row['password'] ?>" required minlength="8">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh Đại Diện</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="Hinh" >
                            <img src="/DoAnWeb2020/admin/modules/users/img_users/<?php echo $row['avatar'] ?>" >
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                        <!-- End form add product -->
                    </form>  

                </div>
            </div>
        </div>
    </div>
</div>
<style>
label.error{
        color:red;
        font-style: italic;
    }
 h2{
  font-family: "Dancing Script", cursive;
  font-size: xx-large;
  letter-spacing: 8px;
  color: brown;
}
    </style>
<?php
if (isset($_REQUEST['TenUS'])) {
    $sql = "UPDATE `users` SET `name` = '{$_REQUEST['TenUS']}', `address` = '{$_REQUEST['address']}', `email` = '{$_REQUEST['email']}', `Account` = '{$_REQUEST['account']}', `password` = '{$_REQUEST['password']}', `phone` = '{$_REQUEST['phone']}' WHERE `users`.`id` = $id";
   
    DataProvider::ExecuteQuery($sql);
    if (@$_FILES['Hinh']['error'] == 0) {
        move_uploaded_file(@$_FILES['Hinh']["tmp_name"], "../../admin/modules/users/img_users/".@$_FILES['Hinh']["name"]);
        $sql = "UPDATE `users` SET  `avatar` = '{$_FILES['Hinh']["name"]}' WHERE `users`.`id` = $id";
      
        DataProvider::ExecuteQuery($sql);
    }
}
require_once __DIR__ . "/../../layouts/footer.php" ?>
