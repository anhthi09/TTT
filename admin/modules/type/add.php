<?php
require_once __DIR__ . "/../../autoload/autoload.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   header('location: http://localhost:8080/DoAnWeb2020/admin/modules/type');
}
?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>
<div class="product-status mg-tb-15">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:480px">
            <div class="product-status-wrap">
               <h4>Thêm Loại Sản Phẩm</h4>
               <form action="" method="post" enctype="multipart/form-data">
                  <div class="row ">
                     <div class="col-lg-2">
                        <label>Danh Mục Sản Phẩm</label>
                     </div>
                     <div class="col-lg-2 ">
                        <select class="form-control form-control-lg" name="loaisp">
                           <?php
                           $dsLoaiSP = DataProvider::ExecuteQuery("SELECT id, name FROM category");
                           while ($loai = mysqli_fetch_array($dsLoaiSP)) {
                              echo  " <option value='{$loai['id']}'> {$loai['name']} </option>";
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Tên loại" name="tenloai">
                     </div>
                     <div class="col-lg-4">
                        <input class="btn btn-primary" type="submit" value="Submit">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
$tenloai = @$_REQUEST['tenloai'];
$loaisp = @$_REQUEST['loaisp'];
if (isset($tenloai)) {
   $sql = "INSERT INTO `type` (`id`, `name`, `category`) VALUES (NULL, '{$tenloai}', '{$loaisp}')";
   echo $sql;
   $result = DataProvider::ExecuteQuery($sql);
}
require_once __DIR__ . "/../../layouts/footer.php" ?>