<?php
require_once __DIR__ . "/../../layouts/header.php";
require_once __DIR__ . "/../../autoload/autoload.php";
?>

<body >
    <h2 class="text-center">Đơn hàng của bạn</h2>

    <div class="container" style="min-height:664px">
        <table class="table table-hover">
            <thead>
                <tr id="alll"> 
                    <th style="width:15%">Mã đơn hàng</th>
                    <th style="width:20%">Ngày mua</th>
                    <th style="width:25%">Tên sản phẩm</th>
                    <th style="width:20%" class="text-center">Thành tiền</th>
                    <th style="width:20%">Trạng thái đơn hàng</th>
                </tr>
            </thead>
            <tbody>
            <?php
                        try {
                            $sql = "SELECT * FROM transaction";
                            if (isset($_SESSION['id'])) {
                                $id = $_SESSION['id'];
                                $sql .= " WHERE user_id = " . $id;
                            }
                            $result = DataProvider::ExecuteQuery($sql);
                            
                          
                        } catch (Exception $ex) {
                            echo "Không thể mở CSDL";
                        } 

                        
                        ?>
                         <?php while($row = mysqli_fetch_array($result)) :?>
                            <?php if ($row['status']==0 ){ $status = "chưa xác nhận";  }
                        else {
                            $status = "Đã xác nhận";
                        } ?>
                <tr>
                   
                    <td data-th="Order"><?php echo $row['id']?></td>
                    <td data-th="Date"><?php echo $row['created_at']?></td>
                    <td data-th="Product">
                    <?php 
                    $sql1 = "SELECT * FROM `orders` WHERE `transaction_id` = {$row['id']} ";
                                                                                                                                       
                    $result1 = DataProvider::ExecuteQuery($sql1);
                    ?> 
                    <?php while( $row1 = mysqli_fetch_array($result1)):?>
                        <?php     $sql3 = "SELECT * FROM `product` WHERE `id` = {$row1['product_id']} ";  
                                                                                                                                   
                                     $result3 = DataProvider::ExecuteQuery($sql3);
                                    $row3 = mysqli_fetch_array($result3);
                                    
                                    ?>
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="/DoAnWeb2020/admin/modules/product/img_product/<?php echo $row3['avatar']?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?php echo $row3['name'] ?></h4>
                                
                            </div>
                        </div>
                    <?php endwhile ?>
                    </td>
                    </td>
                    <td data-th="Subtotal" class="text-center"><?php echo number_format($row['amount'],0) ?> VNĐ</td>
                    <td data-th="Status"> <?php echo $status ?> </td>

                    </td>
                   
                </tr>
                <?php endwhile ?>






            </tbody>
            <tfoot>
                
                <tr>
                    <td><a href="/DoAnWeb2020/public/index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                    </td>
                    <td colspan="2" class="hidden-xs"> </td>
                    <td class="hidden-xs text-center"><strong></strong>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
<style>
#alll {
        color: blue;
}
 h2{
  font-family: "Dancing Script", cursive;
  font-size: xx-large;
  letter-spacing: 8px;
  color: brown;
}
</style>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>