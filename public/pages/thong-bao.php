<?php
require_once __DIR__ . "/../../layouts/header.php";
require_once __DIR__ . "/../../autoload/autoload.php";
?>
<!-- Begin element -->
<?php 
if (isset ($_SESSION['success'])){
echo "<script> alert ('{$_SESSION['success']}')</script> ";
      unset($_SESSION['success']);  

      echo "<script>  location.href='don-hang.php' </script> ";
   


} 
  
?>
<?php require_once __DIR__ . "/../../layouts/footer.php" ?>