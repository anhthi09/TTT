<?php
require_once __DIR__ . "/../../autoload/autoload.php";
if (isset  ($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE  FROM `transaction` WHERE id='$id'";
    $result = DataProvider::ExecuteQuery($sql);
    
    $sql1="DELETE  FROM `orders` WHERE transaction_id='$id'";
    $result1 = DataProvider::ExecuteQuery($sql1);
    header('location: index.php');
}
else{
    echo"không bắt được id";
}
?>

