<?php
require_once __DIR__ . "/../../autoload/autoload.php";

?>
<?php require_once __DIR__ . "/../../layouts/header.php" ?>
<style>
    label.error {
        color: red;
        font-style: italic;
    }
</style>
<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Thêm Sản Phẩm Mới</h4>
                    <div>
                        <!-- Begin form add product -->
                        <form id="formAdd1" onsubmit="addProduct(this)">
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control form-control-lg" name="category" id="category"> </select>
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
                            <div class="form-group">
                                <label>Loại Sản Phẩm</label>
                                <select class="form-control form-control-lg" name="type" id="type">
                                </select>
                                <script>
                                    var requestUrl = 'http://localhost:8080/api/api/type/read.php';
                                    fetch(requestUrl, {
                                            method: "get"
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            document.getElementById("type").innerHTML = '';
                                            var content = ``;
                                            data.data.records.forEach(element => {
                                                content += ` <option value='${element.id}'> ${element.name} </option>`;
                                            });
                                            document.getElementById("type").innerHTML = content;


                                        });
                                </script>
                            </div>
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label>Số Lượng</label>
                                <input type="number" class="form-control" placeholder="1" name="soluong" id="soluong">
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="number" class="form-control" placeholder="9 000 000" name="gia" id="gia">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ảnh</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="avatar" id="avatar">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Mô Tả Sản Phẩm</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="content" id="content"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                            <!-- End form add product -->
                        </form>


                        <script>
                            function addProduct(el) {
                                const name = document.querySelector('[name="name"]').value;
                                const soluong = document.querySelector('[name="soluong"]').value;
                                const gia = document.querySelector('[name="gia"]').value;
                                const avatar = document.querySelector('[name="avatar"]').value;
                                const category = document.querySelector('[name="category"]').value;
                                const type = document.querySelector('[name="type"]').value;
                                const content = document.querySelector('[name="content"]').value;
                                const requestObj = {
                                    name: name,
                                    soluong: soluong,
                                    gia: gia,
                                    type: type,
                                    category: category,
                                    avatar:avatar,
                                    content: content
                                };
                                $.ajax({
                                    type: 'POST',
                                    url: 'http://localhost:8080/api/api/product/create.php',
                                    crossDomain: true,
                                    data: JSON.stringify(requestObj),
                                    contentType: 'application/json; charset=utf-8',
                                    dataType: 'json',
                                    success: function(data) {
                                        if (data == "no_errors") window.location.href = 'http://localhost:8080/TTT/admin/modules/product/index.php';
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
                                        soluong: {
                                            required: true,
                                            digits: true,
                                            min: 1
                                        },
                                        gia: {
                                            required: true,
                                            digits: true,
                                            min: 1
                                        },
                                        // avatar: {
                                        //     required: true
                                        // },
                                        content: {
                                            required: true
                                        }
                                    },
                                    messages: {
                                        name: {
                                            required: "Vui lòng nhập tên sản phẩm",
                                            minlength: "Vui lòng nhập lớn hơn 3 kí tự"
                                        },
                                        soluong: {
                                            required: "Vui lòng nhập số lượng sản phẩm",
                                            digits: "Vui lòng nhập số nguyên",
                                            min: "Vui lòng nhập số lượng lớn hơn 0"
                                        },
                                        gia: {
                                            required: "Vui lòng nhập giá sản phẩm",
                                            min: "Vui lòng nhập giá lớn hơn 0",
                                            digits: "Vui lòng nhập số nguyên"
                                        },
                                        // avatar: {
                                        //     required: "Vui lòng chọn ảnh"
                                        // },
                                        content: {
                                            required: "Vui lòng nhập mô tả"
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
</div>

<?php require_once __DIR__ . "/../../layouts/footer.php" ?>