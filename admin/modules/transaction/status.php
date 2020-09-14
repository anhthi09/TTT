<?php 
require_once __DIR__ . "/../../autoload/autoload.php";
try {
    $sql ="SELECT * FROM `transaction`";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql .= " WHERE id = " . $id;
    
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    if ($row['status']==0){
        $sql="UPDATE `transaction` SET `status` = '1' WHERE `transaction`.`id` = $id";
        DataProvider::ExecuteQuery($sql);
        header('location: index.php');

    }
    else {
        $sql="UPDATE `transaction` SET `status` = '0' WHERE `transaction`.`id` = $id";
        DataProvider::ExecuteQuery($sql);
        header('location: index.php');
    }
}
} catch (Exception $ex) {
    echo "Không thể mở CSDL";
}
?>





