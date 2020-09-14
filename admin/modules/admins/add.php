<?php
require_once __DIR__ . "/../../autoload/autoload.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('location: index.php');
}
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
                    <h4>Thêm Admin</h4>
                <!-- Begin form add product -->
                    <form action="" method="post" enctype="multipart/form-data" id="adminAdd">
                        <div class="form-group">
                            <label>Tên Admin</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="TenAD">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" class="form-control" placeholder="351 Lạc Long Quân-Phường 4- Quận 5- Thành Phố Hồ Chí Minh" name="address">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input type="number" class="form-control" placeholder="0345197643" name="phone">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="ABC@gmail.com" name="email">
                        </div>
                        <div class="form-group">   
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="**********" name="pass">
                        </div>
                        <div class="form-group">   
                            <label>Nhập lại password</label>
                            <input type="password" class="form-control" placeholder="***********" name="nhappass">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh Đại Diện</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="Hinhdd">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>

                <!-- End form add product -->
                    </form>
                    <script>
                        $(function () {
                        $("#adminAdd").validate({
                            rules: {
                                TenAD: { required: true ,minlength:3 },
                                address:{required: true},
                                phone:{required: true,digits:true,rangelength:[10,11]},
                                email:{required: true,email:true},
                                pass:{required:true,minlength:8},
                                nhappass:{required:true,equalTo:"[name='pass']"},
                                Hinhdd:{required:true,extension:"jpg|png|bmp"}
                            },
                            messages: {
                                TenAD: { required:"Vui lòng nhập tên Admin" ,minlength: "Vui lòng nhập lớn hơn 3 kí tự"},
                                address: { required: "Vui lòng nhập địa chỉ"},
                                phone:{required: "Vui lòng nhập số điện thoại",digits:"Vui lòng nhập số nguyên",rangelength:"Số điện thoại chưa đúng định dạng"},
                                email:{required: "Vui lòng nhập email",email:"Vui lòng điền đúng định dạng email"},
                                pass:{required: "Vui lòng nhập password",minlength:"Vui lòng nhập lớn hơn 8 kí tự"},
                                nhappass:{required:"Vui lòng nhập lại password",equalTo:"Mật khẩu chưa khớp"},
                                Hinhdd:{required:"Vui lòng chọn ảnh",extension:"Chỉ chấp nhận file jpg|png|bmp"}

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
if(@$_FILES['Hinhdd']['error'] == 0){
    if(move_uploaded_file(@$_FILES['Hinhdd']["tmp_name"], "img_admins/".@$_FILES['Hinhdd']["name"]))
        {
            $sql = "INSERT INTO `admins` (`id`, `name`, `address`, `email`, `account`,`password`, `phone`, `status`, `level`, `avatar`, `created_at`, `updata_up`) 
            VALUES (NULL, '{$_REQUEST['TenAD']}', '{$_REQUEST['address']}','{$_REQUEST['email']}', '{$_REQUEST['account']}','{$_REQUEST['pass']}', '{$_REQUEST['phone']}', '1','1','{$_FILES['Hinhdd']['name']}', current_timestamp() , current_timestamp())";
        
            DataProvider::ExecuteQuery($sql);
		}
}
require_once __DIR__ . "/../../layouts/footer.php" ?>