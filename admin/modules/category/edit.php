<?php
   require_once __DIR__ . "/../../autoload/autoload.php";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       header('location: /DoAnWeb2020/admin/modules/category');
   }
   ?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>
<div class="product-status mg-tb-15">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="min-height:600px">
            <div class="product-status-wrap">
               <h4>Sửa Danh Mục Sản Phẩm</h4>
               <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-lg-8">
                        <?php
                           try {
                               $sql = "SELECT name FROM category";
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
                        <input type="text" class="form-control" placeholder="Tên danh mục mới" name="tendanhmuc" <?php echo "value='{$row['name']}'" ?>>
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
   if (isset($_POST['tendanhmuc'])) {
       $tendanhmuc = $_POST['tendanhmuc'];
       $sql = "UPDATE `category` SET `name` = '$tendanhmuc' WHERE `category`.`id` = $id";
       $result = DataProvider::ExecuteQuery($sql);
   }
   require_once __DIR__ . "/../../layouts/footer.php"
?>