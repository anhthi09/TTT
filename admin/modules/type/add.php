<?php
require_once __DIR__ . "/../../autoload/autoload.php";

?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>
<div class="product-status mg-tb-15">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:480px">
            <div class="product-status-wrap">
               <h4>Thêm Loại Sản Phẩm</h4>
               <form id="formAdd1" onsubmit="addType(this)">
                  <div class="row ">
                     <div class="col-lg-2">
                        <label>Danh Mục Sản Phẩm</label>
                     </div>
                     <div class="col-lg-2 ">
                        <select class="form-control form-control-lg" name="category" id="category">
                        </select>
                        <script>
                                    var requestUrl = 'http://localhost:8080/api/api/category/read.php';
                                    fetch(requestUrl, {
                                            method: "get"
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            document.getElementById("category").innerHTML = '';
                                            var content = ``;
                                            data.data.records.forEach(element => {
                                                content += ` <option value='${element.id}'> ${element.name} </option>`;
                                            });
                                            document.getElementById("category").innerHTML = content;


                                        });
                                </script>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Tên loại" name="name">
                     </div>
                     <div class="col-lg-4">
                        <input class="btn btn-primary" type="submit" value="Submit">
                     </div>
                  </div>
               </form>
               <script>
                            function addType(el) {
                                const name = document.querySelector('[name="name"]').value;
                                const category = document.querySelector('[name="category"]').value;
                                const requestObj = {
                           
                                 category: category,
                                 name: name,
                                    
                                   
                                };
                                $.ajax({
                                    type: 'POST',
                                    url: 'http://localhost:8080/api/api/type/create.php',
                                    crossDomain: true,
                                    data: JSON.stringify(requestObj),
                                    contentType: 'application/json; charset=utf-8',
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data == "no_errors") window.location.href = 'http://localhost:8080/TTT/admin/modules/type/index.php';
                                    }
                                })
                            }
                            $(function() {
                                $("#formAdd1").validate({
                                    rules: {
                                        name: {
                                            required: true,
                                            minlength: 3
                                        },
                                        
                                    },
                                    messages: {
                                        name: {
                                            required: "Vui lòng nhập loại sản phẩm",
                                            minlength: "Vui lòng nhập lớn hơn 3 kí tự"
                                        },

                                    }

                                });
                            });
                        </script>



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