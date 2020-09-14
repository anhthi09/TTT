<?php
require_once __DIR__ . "/../../autoload/autoload.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   header('location: /DoAnWeb2020/admin/modules/type');
}
?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>
<div class="product-status mg-tb-15">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:600px">
            <div class="product-status-wrap">
               <h4>Sửa Loại Sản Phẩm</h4>
               <?php
                           try {
                               $sql = "SELECT id, name, category  FROM type";
                               if (isset($_GET['id'])) {
                                   $id = $_GET['id'];
                                   $sql .= " WHERE id = " . $id;
                               }
                               $result = DataProvider::ExecuteQuery($sql);
                               $row = mysqli_fetch_array($result);
                              
                           } catch (Exception $ex) {
                               echo "Không thể mở CSDL";
                           }
                           ?>
               <form action="" method="post" enctype="multipart/form-data">
                  <div class="row ">
                     <div class="col-lg-2">
                        <label>Danh Mục Sản Phẩm</label>
                     </div>
                     <div class="col-lg-2 ">
                        <select class="form-control form-control-lg" name="loaisp">
                           <?php
                           $dsLoaiSP = DataProvider::ExecuteQuery("SELECT id, name FROM category");
                           while ($loai = mysqli_fetch_array($dsLoaiSP)) { ?>
                               <option value='<?php echo $loai['id'] ?>' <?php echo $row['category']==$loai['id'] ? "selected ='selected'" : ' ' ?> > <?php echo $loai['name'] ?> </option>;
                         <?php   } ?>
                           
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Tên loại" name="tenloai" <?php echo "value='{$row['name']}'"?>>
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

if (isset($_REQUEST['tenloai'])) {
   $sql = "UPDATE `type` SET `name` = '{$_REQUEST['tenloai']}', `category` = '{$_REQUEST['loaisp']}' WHERE `type`.`id` = $id";
   echo $sql;
   DataProvider::ExecuteQuery($sql);
}
require_once __DIR__ . "/../../layouts/footer.php" ?>