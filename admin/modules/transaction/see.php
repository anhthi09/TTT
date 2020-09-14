
<?php require_once __DIR__ . "/../../autoload/autoload.php"; ?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>
<div class="product-status mg-tb-15">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Thông Tin Đơn Hàng Đơn Hàng</h4>
                    <!-- Begin form add product -->
                    <form action="" method="post" enctype="multipart/form-data" id="USedit">
                        <?php
                        try {
                            $sql = "SELECT * FROM `transaction` ";
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $sql .= " WHERE id = " . $id;
                            }
                        
                            $result = DataProvider::ExecuteQuery($sql);
                            $row = mysqli_fetch_array($result);
                           
                            $sql1 = "SELECT * FROM `orders` WHERE `transaction_id` = {$row['id']} ";
                                                                                                                                       
                            $result1 = DataProvider::ExecuteQuery($sql1);
                            
                         
                            $sql2 = "SELECT * FROM `users` WHERE `id` = {$row['user_id']} ";  
                                                                                                                                   
                            $result2 = DataProvider::ExecuteQuery($sql2);
                            $row2 = mysqli_fetch_array($result2);
                      

                        } catch (Exception $ex) {
                            echo "Không thể mở CSDL";
                        }
                        ?>

                        <div class="form-group">
                            <label>Tên Người Đặt</label>
                            <input readonly="" type="text" class="form-control" placeholder="Enter name" name="TenUS" value="<?php echo $row2['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ Giao</label>
                            <input readonly="" type="text" class="form-control" placeholder="351 Lạc Long Quân-Phường 4- Quận 5- Thành Phố Hồ Chí Minh" name="address" value="<?php echo $row2['address'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input readonly="" type="number" class="form-control" placeholder="0345197655" name="phone" value="<?php echo $row2['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input readonly="" type="email" class="form-control" placeholder="ABC@gmail.com" name="email" value="<?php echo $row2['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Số Tiền Cần Thanh Toán</label>
                            <input readonly="" type="text" class="form-control" placeholder="" name="tongtien" value="<?php echo number_format($row['amount'],0) ?> VNĐ">
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <input  readonly=""  type="text" class="form-control" placeholder="Liên lạc trước khi giao giúp mình!" name="note" value="<?php echo $row['note'] ?>" >
                        </div>
                       
                  

                        <!-- End form add product -->
                    </form>
                    
                    <table  class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:40%">Tên sản phẩm</th>
                    <th style="width:20%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền</th>
                    <th style="width:10%">  </th>
                </tr>
            </thead>           
            <tbody> 
                <?php         
            while( $row1 = mysqli_fetch_array($result1) ) { 
                
                
                $sql3 = "SELECT * FROM `product` WHERE `id` = {$row1['product_id']} ";  
                                                                                                                                   
                $result3 = DataProvider::ExecuteQuery($sql3);
                $row3 = mysqli_fetch_array($result3);
                
                
                ?>
               
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="/DoAnWeb2020/admin/modules/product/img_product/<?php echo $row3['avatar']?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?php echo $row3['name'] ?></h4>
                               
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"> <?php echo number_format ($row3['gia']-$row3['gia']*$row3['sale']/100,0) ?> VNĐ</td>
                    <td data-th="Quantity"><?php echo $row1['soluong'] ?>
                    </td>
                   
                    <td data-th="Subtotal" class="text-center"> <?php echo number_format (($row3['gia']-$row3['gia']*$row3['sale']/100)*$row1['soluong'],0) ?>VNĐ</td>
                   
                    
                </tr>
             
                <?php } ?>
               
            </tbody>
           
           
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
           
         </div>
      </div>
   </div>
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>