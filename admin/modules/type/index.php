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
               <h4>Danh Mục</h4>
               <div class="add-product">
                  <a href="add.php">Thêm Loại</a>
               </div>
               <table>
                  <tr>
                     <th>Stt</th>
                     <th>Tên Danh Mục</th>
                     <th>Loại</th>
                     <th>Setting</th>
                  </tr>
                  <?php
                  try {
                     $from = ($trang -1 ) * $sotin1trang;
                     $sql = "SELECT id, name, category FROM `type` LIMIT $from, $sotin1trang";
                     $result = DataProvider::ExecuteQuery($sql);
                     $stt = 0;
                     while ($row = mysqli_fetch_array($result)) {
                        $sql1="SELECT name FROM `category` WHERE `id` = '{$row['category']}'";                  
                        $result1= DataProvider::ExecuteQuery($sql1);
                        $row1= mysqli_fetch_array($result1);
                        $stt++;
                        $chuoi = <<< EOD
                             <tr>
                             <td>$stt</td>
                             <td> {$row1['name']}</td>
                             <td> {$row['name']} </td>
                             
                             <td>
                                 <a href="edit.php?id= {$row['id']} "> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                 <a href="delete.php?id= {$row['id']}" onclick="return confirm('Bạn có chắc muốn xóa loại sản phẩm này?')"> <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"> </i> </button> </a>
                             </td>
                         </tr>
                         EOD;
                        echo $chuoi;
                     }
                  } catch (Exception $ex) {
                     echo "Không thể mở CSDL";
                  }
                  ?>
               </table>
               <div id="phantrangtype">
             <?php
             $x = "SELECT id FROM `type`";
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
   #phantrangtype{
      font-size:larger;

   }
   </style>
            </div>
         </div>
      </div>
   </div>
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>