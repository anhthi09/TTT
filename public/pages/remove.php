<?php
session_start();
require_once __DIR__ . "/../../autoload/autoload.php";
if(isset ($_GET['key'])){
    $key=$_GET['key'];
}

unset ($_SESSION['cart'][$key]);
$_SESSION['success']="Xóa sản phẩm thành công!";
header("location: gio-hang.php");
?>