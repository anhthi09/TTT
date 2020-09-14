<?php
require_once __DIR__ . "/../../layouts/header.php";
require_once __DIR__ . "/../../autoload/autoload.php";
?>
<!-- Begin element -->

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
                    <input type="radio" class="sort" id="a-z" data-oder="ASC"name="sortgia"></input>
                    Từ thấp đến cao
                </label>
            </li>
            
        </ul>
        <ul class="content_left_nav"> Sắp Xếp Theo Tên
            <li>
                <label>
                    <input type="radio" class="sort" id="A-Z" data-oder="ASC" name="sortten" ></input>
                    A-Z
                </label>
            </li>
            <li>
                <label>
                    <input type="radio" class="sort" id="Z-A" data-oder="DESC"name="sortten"></input>
                    Z-A
                </label>
            </li>
            
        </ul>

    </div>
    <div class="san_pham row">
        <?php
         
        if ( isset ($type10)  && $search != "") 
        {
            $type11 = DataProvider::ExecuteQuery("$query");
                          
            
            while ($row = mysqli_fetch_array($type11)  ) {
             
                $giagoc=number_format($row['gia'],0);
                  if ($row['sale'] <= 0){
                                   
                  $chuoi = <<< EOD
                                  <div class="khung_san_pham col-4">
                                  <div class="Hinh_anhsp">
                                      <a href=" xem-hang.php?id= {$row['id']}"><img src="/DoAnWeb2020/admin/modules/product/img_product/{$row['avatar']}"  alt="poto"></a>
                                  </div>
                                  <div class="ten_sp">
                                      <p> {$row['name']}</p>
                                  </div>
                                  <div class="gia_sp">
                                  <p>   $giagoc VNĐ </p>
                                  </div>
                                  </div>
                              EOD;
                  echo $chuoi;
                }
              else {
                  
                  $gia= number_format($row['gia']-$row['gia']*$row['sale']/100,0);
                 
                  $chuoi = <<< EOD
                                  <div class="khung_san_pham col-4">
                                  <div class="Hinh_anhsp">
                                      <a href=" xem-hang.php?id= {$row['id']}"><img src="/DoAnWeb2020/admin/modules/product/img_product/{$row['avatar']}"  alt="poto"></a>
                                  </div>
                                  <div class="ten_sp">
                                      <p> {$row['name']}</p>
                                  </div>
                                  <div class="gia_sp">
                                  <strike>  $giagoc VNĐ </strike>
                                  <p>  $gia  VNĐ</p>
                                  </div>
                                  </div>
                              EOD;
                  echo $chuoi;
              }    
            }


        } 
        else {
            if(isset($_REQUEST['ok'])){
                echo "<script> alert ('Không thể tìm kiếm sản phẩm của bạn! hãy xem các sản phẩm đang có nhé')</script>"; 
            }
            try {
                $sql = "SELECT * FROM `product`";
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    if ($id >=70){
                        $sql .= "WHERE category =" . $id;
                    }
                    else{
                        $sql .= "WHERE type =" . $id;
                    }
                    
                }
                $result = DataProvider::ExecuteQuery($sql);
               
             
                while ($row = mysqli_fetch_array($result)) {
                  $giagoc=number_format($row['gia'],0);
                    if ($row['sale'] <= 0){
                                     
                    $chuoi = <<< EOD
                                    <div class="khung_san_pham col-4">
                                    <div class="Hinh_anhsp">
                                        <a href=" xem-hang.php?id= {$row['id']}"><img src="/DoAnWeb2020/admin/modules/product/img_product/{$row['avatar']}"  alt="poto"></a>
                                    </div>
                                    <div class="ten_sp">
                                        <p> {$row['name']}</p>
                                    </div>
                                    <div class="gia_sp">
                                    <p>   $giagoc VNĐ </p>
                                    </div>
                                    </div>
                                EOD;
                    echo $chuoi;
                }
                else {
                    
                    $gia= number_format($row['gia']-$row['gia']*$row['sale']/100,0);
                   
                    $chuoi = <<< EOD
                                    <div class="khung_san_pham col-4">
                                    <div class="Hinh_anhsp">
                                        <a href=" xem-hang.php?id= {$row['id']}"><img src="/DoAnWeb2020/admin/modules/product/img_product/{$row['avatar']}"  alt="poto"></a>
                                    </div>
                                    <div class="ten_sp">
                                        <p> {$row['name']}</p>
                                    </div>
                                    <div class="gia_sp">
                                    <strike>  $giagoc VNĐ </strike>
                                    <p>  $gia  VNĐ</p>
                                    </div>
                                    </div>
                                EOD;
                    echo $chuoi;
                }
            
                
            }
            } catch (Exception $ex) {
                echo "Không thể mở CSDL";
            }
            
        }


        ?>




    </div>
    <div class="clearfix"></div>



 <!-- <script>  
 $(document).ready(function(){ 
    $(document).on('click','.sort', function(){
         var column_name =$(this).attr("id");   
         if (column_name=='a-z'|| column_name=="z-a"){
             column_name='gia';
         }
         
         if (column_name=='A-Z'|| column_name=="Z-A"){
             column_name='name'; 
         }
         
         var order =$(this).data("order");
           $.ajax({  
                url:"sort.php",  
                method:"POST",  
                data:{column_name  :column_name, order:order, sql:$sql },  
                success:function(data)  
                {  
                     $('#employee_table').html(data);  
                   
                }  
           })  


        })

    });
</script> -->

</element>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>