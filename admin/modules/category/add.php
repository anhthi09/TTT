<?php
   require_once __DIR__ . "/../../autoload/autoload.php";
  
   ?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>
<style>
    label.error{
        color:red;
        font-style: italic;
    }
    </style>
<div class="product-status mg-tb-15">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:480px">
            <div class="product-status-wrap">
               <h4>Thêm Danh Mục Sản Phẩm</h4>
               <form id="formAdd1" onsubmit="addCategory(this)">
                  <div class="row">
                     <div class="col-lg-8">
                        <input type="text" class="form-control" placeholder="Tên danh mục mới" name="name" >
                     </div>

                     <div class="col-lg-4">
                        <input class="btn btn-primary" type="submit" value="Submit">
                     </div>
                  </div>
               </form>
               <script>
                            function addCategory(el) {
                                const name = document.querySelector('[name="name"]').value;
                                
                                const requestObj = {
                                    name: name,
                                    
                                };
                                $.ajax({
                                    type: 'POST',
                                    url: 'http://localhost:8080/api/api/category/create.php',
                                    crossDomain: true,
                                    data: JSON.stringify(requestObj),
                                    contentType: 'application/json; charset=utf-8',
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data == "no_errors") window.location.href = 'TTT/admin/modules/category/index.php';
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
                                            required: "Vui lòng nhập danh mục",
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
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>