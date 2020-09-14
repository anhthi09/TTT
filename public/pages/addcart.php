<?php 
session_start ();
require_once __DIR__ . "/../../autoload/autoload.php"; 
if (!isset ($_SESSION['name'])){
    echo "<script>alert ('Bạn chưa đăng kí tài khoảng. vui lòng đăng kí tài khoảng để tiếp tục mua hàng'); 
    location.href='xem-hang.php'
    
    </script> ";  
}
    else{
    try {
        $sql = "SELECT * FROM product";
        if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql .= " WHERE id = " . $id;
        }
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
                              
    } catch (Exception $ex) {
        echo "Không thể mở CSDL";
    }
//kiểm tra san phẩm có trong giỏ hàng chưa
    if (!isset($_SESSION['cart'][$id])){
        //nếu chwua thì tạo mới
    $_SESSION['cart'][$id]['name']= $row['name'];
    $_SESSION['cart'][$id]['soluong']= 1;
    $_SESSION['cart'][$id]['avatar']= $row['avatar'];
    $_SESSION['cart'][$id]['gia']= $row['gia'];
    $_SESSION['cart'][$id]['sale']= $row['sale'];

    }
    else{
        //nếu có rồi thì cập nhật
        $_SESSION['cart'][$id]['soluong'] += 1;  
    }
    echo "<script> location.href='gio-hang.php'  </script>";                 
}
