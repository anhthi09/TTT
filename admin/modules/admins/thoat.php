<?php 
session_start();
unset($_SESSION['namead']);
unset($_SESSION['idad']);
header('location: ../index.php');
?>