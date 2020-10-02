<?php
// require_once __DIR__ . "/../../autoload/autoload.php";

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
                    <h4>Thêm User</h4>
                <!-- Begin form add product -->
                <form id="formAdd1" onsubmit="addUsers(this)">
                        <div class="form-group">
                            <label>Tên Người Dùng</label>
                            <input type="text" class="form-control" placeholder="Nhập Tên Người Dùng" name="name">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" class="form-control" placeholder="64 Hoàng Hoa Thám" name="address">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input type="number" class="form-control" placeholder="Nhập số điện thoại" name="phone">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="ABC@gmail.com" name="email">
                        </div>
                        <div class="form-group">
                            <label>Tên Đăng Nhập</label>
                            <input type="text" class="form-control" placeholder="NguyenVanA" name="Account">
                        </div>
                        <div class="form-group">   
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password từ 8 kí tự" name="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh Đại Diện</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="avatar">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>

                <!-- End form add product -->
                    </form>
                    <script>
                            function addUsers(el) {
                                const name = document.querySelector('[name="name"]').value;
                                const address = document.querySelector('[name="address"]').value;
                                const email = document.querySelector('[name="email"]').value;
                                const Account = document.querySelector('[name="Account"]').value;
                                const password = document.querySelector('[name="password"]').value;
                                const phone = document.querySelector('[name="phone"]').value;
                                const avatar = document.querySelector('[name="avatar"]').value;
                                const requestObj = {
                                    name: name,
                                    address: address,
                                    email: email,
                                    Account: Account,
                                    password: password,
                                    phone: phone,
                                    avatar: avatar
                                };
                                $.ajax({
                                    type: 'POST',
                                    url: 'http://localhost:8080/api/api/user/create.php',
                                    crossDomain: true,
                                    data: JSON.stringify(requestObj),
                                    contentType: 'application/json; charset=utf-8',
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data == "no_errors") window.location.href = 'TTT/admin/modules/users/index.php';
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
                                        address: {
                                            required: true,
                                            
                                        },
                                       
                                        email: {
                                            required: true,
                                            email:true
                                        },
                                        Account: {
                                            required: true ,
                                            minlength:3
                                        },
                                        password: {
                                            required:true,
                                            minlength:8
                                        },
                                        phone: {
                                            required: true,
                                            digits:true,
                                            rangelength:[10,11]
                                        },
                                        avatar: {
                                            required:true,
                                            extension:"jpg|png|bmp|jpeg"
                                        }

                                    },
                                    messages: {
                                        name: {
                                            required:"Vui lòng nhập tên User" ,
                                            minlength: "Vui lòng nhập lớn hơn 3 kí tự"
                                        },
                                        address: {
                                            required: "Vui lòng nhập địa chỉ"
                                        },
                                        
                                        email: {
                                            required: "Vui lòng nhập email",
                                            email:"Vui lòng điền đúng định dạng email"
                                        },
                                        Account: {
                                            required:"Vui lòng nhập tên đăng nhập" ,
                                            minlength: "Vui lòng nhập lớn hơn 3 kí tự"
                                        },
                                        password: {
                                            required: "Vui lòng nhập password",
                                            minlength:"Vui lòng nhập lớn hơn 8 kí tự"
                                        },
                                        phone: {
                                            required: "Vui lòng nhập số điện thoại",
                                            digits:"Vui lòng nhập số nguyên",
                                            rangelength:"Số điện thoại chưa đúng định dạng"
                                        },
                                        avatar: {
                                            required:"Vui lòng chọn ảnh",
                                            extension:"Chỉ chấp nhận file jpg|png|bmp|jpeg"
                                        }

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