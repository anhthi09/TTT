<?php
require_once __DIR__ . "/../../autoload/autoload.php";
if (isset  ($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE  FROM `users` WHERE id='$id'";
    $result = DataProvider::ExecuteQuery($sql);
    header('location: index.php');
}
else{
    echo"không bắt được id";
}
?>

