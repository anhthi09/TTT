<?php 
require_once __DIR__ . "/../../layouts/header.php";
require_once __DIR__ . "/../../autoload/autoload.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tongtien= $_SESSION['tongtien'];
    $idHD=$_SESSION['id'];
    $note=$_POST['note'];
    $sql = "INSERT INTO `transaction` (`id`, `amount`, `user_id`, `status`, `note`, `created_at`, `created_up`) 
            VALUES (NULL, '$tongtien', '$idHD', '0', '$note', current_timestamp(), current_timestamp())";
    DataProvider::ExecuteQuery($sql);

    $sql="SELECT * FROM `transaction` WHERE `amount` = $tongtien AND `user_id` = $idHD AND `note` LIKE '$note'";
    
    $result = DataProvider::ExecuteQuery($sql);
  
    
    $row = mysqli_fetch_array($result);
 
    foreach($_SESSION['cart'] as $key=>$value){
        $transaction_id=$row['id'];
        $ptoduct_id= $key;
        $soluong= $value['soluong'];
        $gia=$value['gia'];
        $sale=$value['sale'];
        $sql = "INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `soluong`, `gia`, `sale`,`created_at`) 
        VALUES (NULL, '$transaction_id', '$ptoduct_id', '$soluong', '$gia', '$sale', current_timestamp())";
       
        DataProvider::ExecuteQuery($sql);
    }

    unset($_SESSION['cart']);
    unset($_SESSION['tongtien']);
    $_SESSION['success']="Cảm ơn quý khách đã tin tưởng! Đơn hàng của bạn đã được ghi nhận. Chúng tôi sẽ liên hệ với bạn sớm nhất.";
    echo "<script>  location.href='thong-bao.php'   </script>";
}
?>
<div class="product-status mg-tb-15" style="min-height:618px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h2 class="text-center">Thanh Toán Đơn Hàng </h2>
                    <!-- Begin form add product -->
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
                            <input readonly="" type="text" class="form-control" placeholder="Enter name" name="TenUS" value="<?php echo $row['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input readonly="" type="text" class="form-control" placeholder="351 Lạc Long Quân-Phường 4- Quận 5- Thành Phố Hồ Chí Minh" name="address" value="<?php echo $row['address'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input readonly="" type="number" class="form-control" placeholder="0345197655" name="phone" value="<?php echo $row['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input readonly="" type="email" class="form-control" placeholder="ABC@gmail.com" name="email" value="<?php echo $row['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Số Tiền Cần Thanh Toán</label>
                            <input readonly="" type="text" class="form-control" placeholder="" name="tongtien" value="<?php echo number_format($_SESSION['tongtien'],0) ?> VNĐ">
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <input  type="text" class="form-control" placeholder="Liên lạc trước khi giao giúp mình!" name="note" >
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Đồng ý</button>

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
require_once __DIR__ . "/../../layouts/footer.php" ?>
