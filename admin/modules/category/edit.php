<?php
   // require_once __DIR__ . "/../../autoload/autoload.php";
   // if ($_SERVER["REQUEST_METHOD"] == "POST") {
   //     header('location: /TTT/admin/modules/category');
   // }
   ?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>
<div class="product-status mg-tb-15">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="min-height:600px">
            <div class="product-status-wrap">
               <h4>Sửa Danh Mục Sản Phẩm</h4>
               <form action="" method="post" enctype="multipart/form-data">
                  <div class="row" >
                  <div class="col-lg-8" id="fff"> </div>
                  <script>
                  const urlParams = new URLSearchParams(window.location.search);
                  const id = urlParams.get('id');
                  var requestUrl = 'http://localhost:8080/api/api/category/read_one.php?id='+id;

                  fetch(requestUrl, {
                        method: "get"
                     })
                     .then(response => response.json())
                     .then(data => {
                        document.getElementById("fff").innerHTML = '';
                        var content = ``;
                        data.data.forEach(element => {
                           content += `<input type="text" class="form-control" placeholder="Tên danh mục mới" name="tendanhmuc"  value='${element.name}'  />
                     
                  `;
                        });

                        document.getElementById("fff").innerHTML = content;
                     });
                     console.log(data);
               </script>
                  
                  
                  
                  
                  
                  
                  
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
   // if (isset($_POST['tendanhmuc'])) {
   //     $tendanhmuc = $_POST['tendanhmuc'];
   //     $sql = "UPDATE `category` SET `name` = '$tendanhmuc' WHERE `category`.`id` = $id";
   //     $result = DataProvider::ExecuteQuery($sql);
   // }
   require_once __DIR__ . "/../../layouts/footer.php"
?>