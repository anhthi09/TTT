<?php
session_start();
require_once __DIR__ . "/../../autoload/autoload.php";
$key=intval($_REQUEST['key'] );
$qty=intval($_REQUEST['qty'] );


$_SESSION['cart'][$key]['soluong']= $qty;
echo 1;

?>