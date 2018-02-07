<?php
include './dbconfig.php';

if (isset($_GET['txtPermit']) && !empty($_GET['txtPermit'])) {
  
}else {
  $sqlselCus = "SELECT * FROM customer_master WHERE Is_del = 0";
  echo "เข้าครั้งแรก";
}
/*
$permit = $_GET['txtPermit'];
$name = $_GET['txtCusname'];
$nickname = $_GET['txtCusnickname'];

$objQueryselCus = mysqli_query($dbconfig, $sqlselCus);*/
?>
