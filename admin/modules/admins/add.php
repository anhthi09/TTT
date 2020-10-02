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
                <form id="formAdd1" onsubmit="addAdmin(this)">
                        <div class="form-group">
                            <label>Tên Admin</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" class="form-control" placeholder="64 Hoàng Hoa Thám" name="address">
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
                            <input type="password" class="form-control" placeholder="**********" name="password">
                        </div>
                        <div class="form-group">   
                            <label>Nhập lại password</label>
                            <input type="password" class="form-control" placeholder="**********" name="nhappass">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh Đại Diện</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="avatar">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>

                <!-- End form add product -->
                    </form>
                    <script>
                                function addAdmin(el) {
                                const name = document.querySelector('[name="name"]').value;
                                const address = document.querySelector('[name="address"]').value;
                                const email = document.querySelector('[name="email"]').value;
                                const password = document.querySelector('[name="password"]').value;
                                const phone = document.querySelector('[name="phone"]').value;
                                const avatar = document.querySelector('[name="avatar"]').value;
                                const requestObj = {
                                    name: name,
                                    address: address,
                                    email: email,
                                    password: password,
                                    phone: phone,
                                    avatar: avatar
                                };
                                $.ajax({
                                    type: 'POST',
                                    url: 'http://localhost:8080/api/api/create.php',
                                    crossDomain: true,
                                    data: JSON.stringify(requestObj),
                                    contentType: 'application/json; charset=utf-8',
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data == "no_errors") window.location.href = 'TTT/admin/modules/admin/index.php';
                                    }
                                })
                            }
                            $(function() {
                                $("#formAdd1").validate({
                            rules: {
                                name: { required: true ,minlength:3 },
                                address:{required: true},
                                phone:{required: true,digits:true,rangelength:[10,11]},
                                email:{required: true,email:true},
                                password:{required:true,minlength:8},
                                nhappass:{required:true,equalTo:"[name='password']"},
                                avatar:{required:true,extension:"jpg|png|bmp"}
                            },
                            messages: {
                                name: { required:"Vui lòng nhập tên Admin" ,minlength: "Vui lòng nhập lớn hơn 3 kí tự"},
                                address: { required: "Vui lòng nhập địa chỉ"},
                                phone:{required: "Vui lòng nhập số điện thoại",digits:"Vui lòng nhập số nguyên",rangelength:"Số điện thoại chưa đúng định dạng"},
                                email:{required: "Vui lòng nhập email",email:"Vui lòng điền đúng định dạng email"},
                                password:{required: "Vui lòng nhập password",minlength:"Vui lòng nhập lớn hơn 8 kí tự"},
                                nhappass:{required:"Vui lòng nhập lại password",equalTo:"Mật khẩu chưa khớp"},
                                avatar:{required:"Vui lòng chọn ảnh",extension:"Chỉ chấp nhận file jpg|png|bmp"}

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
require_once __DIR__ . "/../../layouts/footer.php" ?>