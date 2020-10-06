<?php session_start ()?>
<?php require_once __DIR__ . "/../../autoload/autoload.php"; ?>
<?php require_once __DIR__ . "/../../layouts/header.php";?>

<div class="product-status mg-tb-15">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:480px">

            <div class="product-status-wrap">
               <h4>Danh Sách Đơn Hàng</h4>
               
               <table>
               </table>
               <script>
                  var requestUrl = 'http://localhost:8080/api/api/transaction/read.php';
                  fetch(requestUrl, {
                        method: "get"
                     })

                     .then(response => response.json())
                     .then(data => {
                        document.querySelector('table').innerHTML = '';
                        var content = ` <tr>
                                     
                     <th>Mã Đơn Hàng</th>
                     <th>Mã Khách Hàng</th>
                   

                     <th>Tổng Tiền</th>
                     <th>Nội Dung</th>
                     <th>Ngày Đặt</th>
                     <th>Setting</th>
                  </tr>`;
                        data.data.records.forEach(element => {
                           content += `
                        <tr id="row-${element.id}">
                                         <td> ${element.id}</td>                                       
                                         <td> ${element.user_id}</td>
                                         
                                         <td> ${element.amount} </td>
                                         
                                         <td> ${element.note} </td>
                                         <td> ${element.created_at} </td>
            
                                        
                                         
                                         <td>
                                         <a href="see.php?id=${element.id} "> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fas fa-eye" aria-hidden="true"></i></button></a>
                                         <a> <button  data-id_xoa=${element.id} data-toggle="tooltip" title="Trash" class="pd-setting-ed delete " ><i class="fa fa-trash-o" aria-hidden="true"> </i> </button> </a>
                                         </td>
                                     </tr>`;
                        });
                        document.querySelector('table').innerHTML = content;

                     });
                     //delete
                     $(document).on('click', '.delete', function() {
                     var id = $(this).data('id_xoa');
                     const bla = {
                        id: id
                     }
                     $.ajax({
                        url: 'http://localhost:8080/api/api/transaction/delete.php',
                        method: "POST",
                        data: JSON.stringify(bla),
                        crossDomain: true,
                        contentType: 'application/json; charset=utf-8',
                        dataType: 'json',
                        success: function(data) {
                           alert('Xóa dữ liệu thành công');
                           window.location = 'http://localhost:8080/TTT/admin/modules/transaction/index.php';
                           // fetch_data();
                        }
                     })
                  })
                   
               </script>






       
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