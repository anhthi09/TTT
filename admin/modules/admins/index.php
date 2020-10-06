<?php session_start ()?>
<?php //require_once __DIR__ . "/../../autoload/autoload.php"; ?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>
<div class="product-status mg-tb-15">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:660px">

            <div class="product-status-wrap">
               <h4>Danh Sách Admin</h4>
               <div class="add-product">
                  <a href="add.php">Thêm Admin</a>
               </div>
               <table>
               </table>
               <script>
         var requestUrl = 'http://localhost:8080/api/api/admin/read.php';
                  fetch(requestUrl, {
                        method: "get"
                     })

                     .then(response => response.json())
                     .then(data => {
                        document.querySelector('table').innerHTML = '';
                        var content = `  <tr>
                     <th>Mã Admin</th>
                     <th>Ảnh Đại Diện</th>
                     <th>Tên Admin</th>
                     <th>Địa Chỉ</th>
                     <th>Email</th>
                     <th>Password</th>
                     <th>Phone</th>
                     <th>Ngày Tạo</th>
                     <th>Ngày Sửa</th>
                     <th>Setting</th>
                  </tr>`;
                     data.data.records.forEach(element => {
                     content += `<tr>
                     <td>${element.id}</td>
                     <td><img src="img_admins/${element.avatar}"</td>
                     <td>${element.name}</td>
                     <td>${element.address}</td>
                     <td>${element.email}</td>
                     <td>${element.pasword}</td>
                     <td>${element.phone}</td>
                     <td> ${element.created_at}</td>
                     <td>${element.updated_at}</td>
                     <td>
                               <a href="edit.php?id=${element.id}"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                              <a> <button  data-id_xoa=${element.id} data-toggle="tooltip" title="Trash" class="pd-setting-ed delete " ><i class="fa fa-trash-o" aria-hidden="true"> </i> </button> </a>
                     </td>
                  </tr>`;
                        });
                        document.querySelector('table').innerHTML = content;

                     });
</script>
            </div>
         </div>
      </div>
   </div>
</div>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>