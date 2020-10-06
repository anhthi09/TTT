<?php
require_once __DIR__ . "/../../layouts/header.php";

?>
<!-- Begin element -->
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <element class="container">
    <div class="left_nav">
            <h2 class="title-nav" style="color: rgb(214, 93, 37)"> Lọc Sản Phẩm  </h2>
            <ul class="content_left_nav">Collection
                <li>
                    <label>
                        <input type="radio" class="sort" id="z-a" data-oder="DESC" name="sortgia"></input>
                        Tất Cả
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" class="sort" id="a-z" data-oder="ASC" name="sortgia"></input>
                        Sofa
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" class="sort" id="a-z" data-oder="ASC" name="sortgia"></input>
                        Giường Ngủ
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" class="sort" id="a-z" data-oder="ASC" name="sortgia"></input>
                        Bàn 
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" class="sort" id="a-z" data-oder="ASC" name="sortgia"></input>
                       Ghế
                    </label>
                </li>

            </ul>
            <ul class="content_left_nav">Thương Hiệu
                <li>
                    <label>
                        <input type="radio" class="sort" id="A-Z" data-oder="ASC" name="sortten"></input>
                       Clever
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" class="sort" id="Z-A" data-oder="DESC" name="sortten"></input>
                        Denver
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" class="sort" id="Z-A" data-oder="DESC" name="sortten"></input>
                        Adersen
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" class="sort" id="Z-A" data-oder="DESC" name="sortten"></input>
                        Emerson
                    </label>
                </li>

            </ul>
        </div>
        <div class="san_pham row" id="spp">
        </div>
        <script>
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');
            console.log(id);
            var requestUrl = 'http://localhost:8080/api/api/product/read_type.php/?type=' + id;
            fetch(requestUrl, {
                    method: "get",
                    data: id
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById("spp").innerHTML = '';
                    var content = ``;
                    data.data.records.forEach(element => {
                        content += `
                <div class="khung_san_pham col-4">
                                  <div class="Hinh_anhsp">
                                      <a href=" xem-hang.php?id=${element.id}"><img src="/TTT/admin/modules/product/img_product/${element.avatar}"  alt="poto"></a>
                                  </div>
                                  <div class="ten_sp">
                                      <p> ${element.name}</p>
                                  </div>
                                  <div class="gia_sp">
                                  <p>   ${element.gia} VNĐ </p>
                                  </div>
                                  <div class="pro-viwer" id="traitim">
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                </div>
                                  </div>`;
                    });
                    document.getElementById("spp").innerHTML = content;
                });
        </script>
        <div class="clearfix"></div>
    </element>
</body>

</html>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>