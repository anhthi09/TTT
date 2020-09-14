<?php

use function PHPSTORM_META\type;

require_once __DIR__ . "/../../layouts/header.php";
require_once __DIR__ . "/../../autoload/autoload.php";

if( !isset ($_SESSION['cart']) ){
    echo "<script> alert ('Chưa có gì trong giỏ hàng. Hãy tiếp tục mua sắm nhé'); 
    location.href='../index.php'</script> ";
}
?>

<!-- Begin element -->
<element class="container">

    <h2 class="text-center">Giỏ Hàng Của Bạn</h2>
    <div class="container" style="min-height:544px">
        <table  class="table table-hover table-condensed">
            <thead>
                <tr id="giohang">
                    <th style="width:40%">Tên sản phẩm</th>
                    <th style="width:20%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền</th>
                    <th style="width:10%">  </th>
                </tr>
            </thead>
            <tbody >
            <?php $tong=0; ?>
            <?php foreach($_SESSION['cart'] as $key => $value): ?>
            
                     <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="/DoAnWeb2020/admin/modules/product/img_product/<?php echo $value['avatar']?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?php echo $value['name'] ?></h4>
                               
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"> <?php echo number_format( $value['gia']-$value['sale']*$value['gia']/100,0) ?> VNĐ</td>
                    <td data-th="Quantity"><input class="form-control text-center qty" value="<?php echo $value['soluong'] ?>" type="number" name="qty" min="0" id="qty">
                    </td>
                    <?php $gia= ($value['gia']-$value['sale']*$value['gia']/100) ?>
                    <td data-th="Subtotal" class="text-center"><?php echo number_format($gia*$value['soluong'],0)?> VNĐ</td>
                    <?php $tong+=$gia*$value['soluong']?>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm updatecart" data-key=<?php echo $key ?>><i class="fa fa-edit"></i>
                        </button>
                        <a href="remove.php?key=<?php echo $key?>" ><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                        </button>
                    </td>
                </tr>
             
                <?php endforeach ?>
               
            </tbody>
            <tfoot>
                
                <tr>
                    <td><a href="show-row.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                    </td>
                    <td colspan="2" class="hidden-xs"> </td>
                    <?php $_SESSION['tongtien'] =$tong ?>
                    <td class="hidden-xs text-center"><strong>Tổng tiền <?php echo number_format($_SESSION['tongtien'],0)?> VNĐ</strong>
                    </td>
                    <td><a href="thanh-toan.php" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</element>
<style>
#giohang{
        color: blue;
}
 h2 {
  font-family: "Dancing Script", cursive;
  font-size: xx-large;
  letter-spacing: 8px;
  color: brown;
    }
</style>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>