<?php
require_once __DIR__ . "/../../layouts/header.php";
require_once __DIR__ . "/../../autoload/autoload.php";
?>
<!-- Begin element -->
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <element class="container">
        <div class="left_nav">
            <h2 class="title-nav"> Filter by </h2>
            <ul class="content_left_nav">Sắp Xếp Theo Giá
                <li>
                    <label>
                        <input type="radio" class="sort" id="z-a" data-oder="DESC" name="sortgia"></input>
                        Từ cao đến thấp
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" class="sort" id="a-z" data-oder="ASC" name="sortgia"></input>
                        Từ thấp đến cao
                    </label>
                </li>

            </ul>
            <ul class="content_left_nav"> Sắp Xếp Theo Tên
                <li>
                    <label>
                        <input type="radio" class="sort" id="A-Z" data-oder="ASC" name="sortten"></input>
                        A-Z
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" class="sort" id="Z-A" data-oder="DESC" name="sortten"></input>
                        Z-A
                    </label>
                </li>

            </ul>
        </div>
        <div class="san_pham row" id="spp">
        </div>
        <script>
            var requestUrl = 'http://localhost:8080/api/product/read.php';
            fetch(requestUrl, {
                    method: "get"
                })

                
                .then(response => response.json())
                .then(data => {
                    document.getElementById("spp").innerHTML = '';
                    var content = ``;
                    data.data.records.forEach(element => {
                        content += `
                <div class="khung_san_pham col-4">
                                  <div class="Hinh_anhsp">
                                      <a href=" xem-hang.php?id= ${element.id}"><img src="/TTT/admin/modules/product/img_product/ ${element.avatar}"  alt="poto"></a>
                                  </div>
                                  <div class="ten_sp">
                                      <p> ${element.name}</p>
                                  </div>
                                  <div class="gia_sp">
                                  <p>   ${element.gia} </p>
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