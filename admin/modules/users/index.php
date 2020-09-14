<?php session_start ()?>
<?php require_once __DIR__ . "/../../autoload/autoload.php"; ?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>
<?php 

if( !isset ($_SESSION['namead']) ){
   echo "<script> alert ('Bạn phải là admin để sử dụng chức năng này. Hãy đăng nhập để tiếp tục nhé'); 
   location.href='/DoAnWeb2020/admin/modules/'</script> ";
}
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
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:660px">

            <div class="product-status-wrap">
               <h4>Danh Sách User</h4>
               <div class="add-product">
                  <a href="add.php">Thêm User</a>
               </div>
               <table>
                  <tr>
                     <th>Stt</th>
                     <th>Ảnh Đại Diện</th>
                     <th>Tên User</th>
                     <th>Địa Chỉ</th>
                     <th>Email</th>

                     <th>Account</th>
                     <th>password</th>
                     <th>Phone</th>
                     <th>Ngày Tạo</th>
                     <th>Ngày Sửa</th>
                     <th>Setting</th>
                  </tr>
                  <?php
                  try {
                     $from = ($trang -1 ) * $sotin1trang;
                     $sql = "SELECT id, name,address,email,Account, password,phone, avatar, created_at, updata_up  FROM `users` ";
                     
                     
                     if (isset($_REQUEST['ok'])) 
                     {
                      
                        

                  // Gán hàm addslashes để chống sql injection
                  $search = addslashes($_GET['search']);
                     
                  // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
               if (empty($search)) {
                     echo "<script> alert ('Hãy nhập tên người dùng để tìm kiếm nhé!')
                     location.href='index.php'</script>"; 

               } 
               else
               {
    

            $sql .=  " WHERE  `name` LIKE '%$search%' LIMIT $from, $sotin1trang";   

            $type11 = DataProvider::ExecuteQuery("$sql");
            
            $type10 = mysqli_fetch_array($type11);
      
            if (isset ($type10)  && $search != "") 
            {      
      
      
               $type11 = DataProvider::ExecuteQuery("$sql");
               $stt = 0;
               while ($row = mysqli_fetch_array($type11)) 
               {
                  $stt++;
                  $chuoi = <<< EOD
                       <tr>
                       <td>$stt</td>
                       <td><img src="img_users/{$row['avatar']}" ></img>  </td>
                       <td> {$row['name']} </td>
                       
                       <td> {$row['address']} </td>
                       <td> {$row['email']} </td>
                       <td> {$row['Account']} </td>
                       <td> {$row['password']} </td>
                       <td> {$row['phone']} </td>
                       <td>{$row['created_at']}</td>
                       <td>{$row['updata_up']}</td>
                       <td>
                           <a href="edit.php?id= {$row['id']} "> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                           <a href="delete.php?id= {$row['id']} "> <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"> </i> </button> </a>
                       </td>
                   </tr>
                   EOD;
                  echo $chuoi;
               }
            }
             else {
                  echo "<script> alert ('Hiện tên người dùng bạn vừa nhập không tồn tại');
                  location.href='index.php'</script> "; 
                 }
            }

         }
    
                     else {
                     $result = DataProvider::ExecuteQuery($sql);
            
                     $stt = 0;
                     while ($row = mysqli_fetch_array($result)) {
                        $stt++;
                        $chuoi = <<< EOD
                             <tr>
                             <td>$stt</td>
                             <td><img src="img_users/{$row['avatar']}" ></img>  </td>
                             <td> {$row['name']} </td>
                             
                             <td> {$row['address']} </td>
                             <td> {$row['email']} </td>
                             <td> {$row['Account']} </td>
                             <td> {$row['password']} </td>
                             <td> {$row['phone']} </td>
                             <td>{$row['created_at']}</td>
                             <td>{$row['updata_up']}</td>
                             <td>
                                 <a href="edit.php?id= {$row['id']} "> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                 <a href="delete.php?id= {$row['id']}" onclick="return confirm('Bạn có chắc muốn xóxa tài khoảng người dùng này?')"> <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"> </i> </button> </a>
                             </td>
                         </tr>
                         EOD;
                        echo $chuoi;

                     }      
                     
                  }     

                  } catch (Exception $ex) {
                     echo "Không thể mở CSDL";
                  }
                  ?>
               </table>
               <div id="phantrangusers">
             <?php
             $x = "SELECT id FROM `users`";
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
   #phantrangusers{
      font-size:larger;

   }
   </style>
            </div>
         </div>
      </div>
   </div>
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>