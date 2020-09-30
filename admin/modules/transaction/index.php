<?php session_start ()?>
<?php require_once __DIR__ . "/../../autoload/autoload.php"; ?>
<?php require_once __DIR__ . "/../../layouts/header.php";?>
<?php
if( !isset ($_SESSION['namead']) ){
   echo "<script> alert ('Bạn phải là admin để sử dụng chức năng này. Hãy đăng nhập để tiếp tục nhé'); 
   location.href='/TTT/admin/modules/'</script> ";}
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
                     <th>Tên Khách Hàng</th>
                     <th>Tổng Tiền</th>
                     <th>Ngày Đặt</th>
                     <th>Trạng Thái</th>
                     <th>Setting</th>
                  </tr>`;
                        data.data.records.forEach(element => {
                           content += `
                        <tr id="row-${element.id}">
                                         <td> ${element.id}</td>                                       
                                         <td> ${element.user_id}</td>
                                         
                                         <td> ${element.amount} </td>
                                         <td> ${element.note} </td>
            
                                         <td> ${element.created_at}</td>
                                         
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






               <div id="phantrangtransaction">
             <?php
             $x = "SELECT id FROM `transaction`";
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