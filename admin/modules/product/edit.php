<?php
//require_once __DIR__ . "/../../autoload/autoload.php";
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     header('location: index.php');
// }
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Sửa Thông Tin Sản Phẩm</h4>
                <!-- Begin form edit product -->
                    <form action="" method="post" enctype="multipart/form-data" id="productEdit">
                        <div class="form-group">
                        <?php
                        //    try {
                        //        $sql = "SELECT * FROM product";
                        //        if (isset($_GET['id'])) {
                        //            $id = $_GET['id'];
                        //            $sql .= " WHERE id = " . $id;
                        //        }
                        //        $result = DataProvider::ExecuteQuery($sql);
                        //        $row = mysqli_fetch_array($result);
                              
                        //    } catch (Exception $ex) {
                        //        echo "Không thể mở CSDL";
                           
                           ?>
                             <label>Danh Mục Sản Phẩm</label>
                            <select class="form-control form-control-lg" name="category">
                                <?php 
                                // $dsLoaiSP = DataProvider::ExecuteQuery( "SELECT id, name FROM category");
                                // while($loai = mysqli_fetch_array($dsLoaiSP)){ ?>
                                //  <option value='<?php echo $loai['id']?>' <?php echo $row['category']==$loai['id'] ? "selected ='selected'" : ' ' ?>> <?php echo $loai['name'] ?> </option> ;
                                // <?php ?>
                                
                            </select>
                            <div class="form-group">
                            <label>Loại Sản Phẩm</label>
                            <select class="form-control form-control-lg" name="type">
                                
                               <!-- // $dsLoai= DataProvider::ExecuteQuery( "SELECT * FROM `type`");
                                //while($loaisp = mysqli_fetch_array($dsLoai)){ ?> -->
                                
                             
                            </select>
                            
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name" <?php echo "value='{$row['name']}'"?>>
                        </div>
                        <div class="form-group">
                            <label>Số Lượng</label>
                            <input type="number" class="form-control" placeholder="1" name="soluong" <?php echo "value='{$row['soluong']}'"?>>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="number" class="form-control" placeholder="9 000 000" name="gia"<?php echo "value='{$row['gia']}'"?>>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="hinh" ?>
                            <img src="img_product/<?php echo $row['avatar'] ?>">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mô Tả Sản Phẩm</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="content"><?php echo "{$row['content']}"?></textarea>
                        </div>
                        <button type="submit" data-id_sua=<?php echo $row['id'] ?> class="btn btn-primary submit">Submit</button>

                <!-- End form add product -->
                    </form>

                    <script>
                    $(document).on('click', '.submit', function() {
                     var id = $(this).data('id_sua');
                     console.log(id);
                     const name = document.querySelector('[name="name"]').value;
                                const soluong = document.querySelector('[name="soluong"]').value;
                                const gia = document.querySelector('[name="gia"]').value;
                                const category = document.querySelector('[name="category"]').value;
                                const type = document.querySelector('[name="type"]').value;
                                const content = document.querySelector('[name="content"]').value;
                                const requestObj = {
                                    id=id,
                                    name: name,
                                    soluong: soluong,
                                    gia: gia,
                                    category: category,
                                    type: type,
                                    content: content
                                };
                                
                     $.ajax({
                        url: 'http://localhost:8080/api/api/product/updata.php',
                        method: "POST",
                        data: JSON.stringify(requestObj),
                        crossDomain: true,
                        contentType: 'application/json; charset=utf-8',
                        dataType: 'json',
                        success: function(data) {
                           alert('Sửa dữ liệu thành công');
                           window.location = 'http://localhost:8080/TTT/admin/modules/product/index.php';
                           // fetch_data();
                        }
                     })
                  })
                        $(function () {
                        $("#productEdit").validate({
                            rules: {
                                TenSP: { required: true ,minlength:3 },
                                soluong:{required: true,digits:true,min:1},
                                Gia:{required: true,digits:true,min:1},
                                
                                
                                noidung:{required:true}
                            },
                            messages: {
                                    TenSP: { required: "Vui lòng nhập tên sản phẩm", minlength: "Vui lòng nhập lớn hơn 3 kí tự"},
                                    soluong:{required: "Vui lòng nhập số lượng sản phẩm",digits:"Vui lòng nhập số nguyên",min:"Vui lòng nhập số lượng lớn hơn 0"},
                                    Gia:{required: "Vui lòng nhập giá sản phẩm",min:"Vui lòng nhập giá lớn hơn 0",digits:"Vui lòng nhập số nguyên"},
                                   
                                  
                                    noidung:{required:"Vui lòng nhập mô tả"}

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
// if (isset($_REQUEST['TenSP'])) {
    
//     $sql = " UPDATE `product` SET `name` = '{$_REQUEST['TenSP']}', `soluong` = '{$_REQUEST['soluong']}', `gia` = '{$_REQUEST['Gia']}', `category` = '{$_REQUEST['loaisp']}', `type` = '{$_REQUEST['type']}', `content` = '{$_REQUEST['noidung']}' WHERE `product`.`id` =  $id";
   
   
//     DataProvider::ExecuteQuery($sql);
//     if (@$_FILES['Hinh']['error'] == 0) {
//         move_uploaded_file(@$_FILES['Hinh']["tmp_name"], "img_product/". @$_FILES['Hinh']["name"]);
//         $sql = "UPDATE `product` SET  `avatar` = '{$_FILES['Hinh']['name']}'  WHERE `product`.`id` = $id";
     
//         echo $sql;
//         DataProvider::ExecuteQuery($sql);
//     }
// }
require_once __DIR__ . "/../../layouts/footer.php" ?>