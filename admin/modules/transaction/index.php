<?php session_start ()?>
<?php require_once __DIR__ . "/../../autoload/autoload.php"; ?>
<?php require_once __DIR__ . "/../../layouts/header.php";?>
<?php
if( !isset ($_SESSION['namead']) ){
   echo "<script> alert ('Bạn phải là admin để sử dụng chức năng này. Hãy đăng nhập để tiếp tục nhé'); 
   location.href='/DoAnWeb2020/admin/modules/'</script> ";}
   $sotin1trang = 10; 
   if( isset($_GET["trang"]) ){
      $trang = $_GET["trang"];
      settype($trang, "int");
   }else{
      $trang = 1;	
   
   }
 ?>
<div class="product-status mg-tb-15">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:480px">

            <div class="product-status-wrap">
               <h4>Danh Sách Đơn Hàng</h4>
               
               <table>
                  <tr>
                     <th>Stt</th>
                     <th>Mã Đơn Hàng</th>                 
                     <th>Tên Khách Hàng</th>
                     <th>Tổng Tiền</th>                    
                     <th>Ngày Đặt</th> 
                     <th>Trạng Thái </th> 
                   
                     <th>Setting</th>
                  </tr>

                  <?php
                  try {
                     $from = ($trang -1 ) * $sotin1trang;
                     $sql = "SELECT * FROM `transaction` ";
                     
                     if (isset($_REQUEST['ok'])) 
                     {
                         // Gán hàm addslashes để chống sql injection
                         $search = addslashes($_GET['search']);
                     
                         // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
                         if (empty($search)) {
                           echo "<script> alert ('Bạn hãy nhập mã đơn hàng nhé')
                           location.href='index.php'</script>"; 

                         } 
                         else
                         {
                              $sql .=  " WHERE `id` LIKE '%$search%' LIMIT $from, $sotin1trang"; 
                          
                              $type11 = DataProvider::ExecuteQuery("$sql");
                              
                              $type10 = mysqli_fetch_array($type11);

                              if (isset ($type10)  && $search != "") 
                              {      
                                 
                                 $type11 = DataProvider::ExecuteQuery("$sql");
                                 $stt = 0;
                                 while ($row = mysqli_fetch_array($type11)) 
                                 {


                                       $sql1="SELECT name FROM `users`  WHERE `users`.`id` = '{$row['user_id']}'";      
                                       // WHERE `category`.`id` = '{$row['category']}'            
                                       $result1= DataProvider::ExecuteQuery($sql1);
                                       $row1= mysqli_fetch_array($result1);
               
                                       
                                       if ($row['status']==0 ){ 
                                          $status = "chưa xác nhận"; 
                                        }
                                       else {
                                          $status = "Đã xác nhận";
                                       }
                                       $stt++;
                                       $chuoi = <<< EOD
                                            <tr>
                                            <td>$stt</td>                                                   
                                            <td> {$row['id']}</td>
                                            <td> {$row1['name']}</td>
                                            <td> {$row['amount']} </td>
                                            <td> {$row['created_at']} </td>
                                            <td> <button type="button" class="btn btn-success">{$status} </button> </td>
                                            <td>
                                                <a href="see.php?id= {$row['id']} "> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fas fa-eye" aria-hidden="true"></i></button></a>
                                                <a href="delete.php?id= {$row['id']}" onclick="return confirm('Bạn có chắc muốn xóa loại sản phẩm này?')"> <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"> </i> </button> </a>                                            </td>
                                        </tr>
                                        EOD;
                                       echo $chuoi;
                                 }
                              }
                              
                           
                                 else {
                                    echo "<script> alert ('Hiện không tìm thấy mã đơn hàng cần tìm');
                                    location.href='index.php'</script> "; 
                                   }
                     } 
                  }
                             
                  else{

                                    $result = DataProvider::ExecuteQuery($sql);
                                    $stt = 0;
                                    while ($row = mysqli_fetch_array($result)) 
                                    {
                                       $sql1="SELECT name FROM `users`  WHERE `users`.`id` = '{$row['user_id']}'";      
                                       // WHERE `category`.`id` = '{$row['category']}'            
                                       $result1= DataProvider::ExecuteQuery($sql1);
                                       $row1= mysqli_fetch_array($result1);
               
                                       
                                       if ($row['status']==0 ){ $status = "chưa xác nhận";  }
                                       else {
                                           $status = "Đã xác nhận";
                                       }
                                       $stt++;
                                       $chuoi = <<< EOD
                                            <tr>
                                            <td>$stt</td>                                                   
                                            <td> {$row['id']}</td>
                                            <td> {$row1['name']}</td>
                                            <td> {$row['amount']} </td>
                                            <td> {$row['created_at']} </td>
                                            <td> <a href="status.php?id= {$row['id']}"><button type="button" class="btn btn-success">{$status} </button></a> </td>
                                            <td>
                                                <a href="see.php?id= {$row['id']} "> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fas fa-eye" aria-hidden="true"></i></button></a>
                                                <a href="delete.php?id= {$row['id']} "> <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"> </i> </button> </a>
                                            </td>
                                        </tr>
                                        EOD;
                                       echo $chuoi;


                                 }
                     }
                  
                  }
                   catch (Exception $ex) {
                     echo "Không thể mở CSDL";
                  }
               ?>
               </table>
               <div id="phantrangtransaction">
             <?php
             $x = "SELECT id FROM `transaction`";
             $kq = DataProvider::ExecuteQuery($x);
             $tongsotin = mysqli_num_rows($kq);
             $sotrang = ceil($tongsotin / $sotin1trang);

               if ($trang > 1 && $sotrang > 1){
               echo '<a href="index.php?trang='.($trang-1).'"> Prev</a> | ';
               }
               for ($i = 1; $i <= $sotrang; $i++){
               if ($i == $trang){
               echo '<span>'.$i.'</span> | ';
               }
               else{
               echo '<a href="index.php?trang='.$i.'">'.$i.'</a> | ';
               }
               }
               if ($trang < $sotrang && $sotrang > 1){
               echo '<a href="index.php?trang='.($trang+1).'">Next</a>  ';
               }
          ?>
</div>
<style>
   #phantrangtransaction{
      font-size:larger;

   }
   </style>
            </div>
         </div>
      </div>
   </div>
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>