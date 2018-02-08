<?php
include './dbconfig.php';

$cus_id = $_POST['txtCusid'];
$permit = $_POST['txtPermit'];
$name = $_POST['txtCusname'];
$nickname = $_POST['txtCusnickname'];
$cname = $_POST['txtCuscontact'];
$address = $_POST['txtCusAdd'];
$tel = $_POST['txtCustel'];

$sql =  "UPDATE customer_master SET permit_id = '".$permit."', cus_name = '".$name."', cus_initials = '".$nickname."', contact_name = '".$cname."', contact_tel = '".$tel."', address = '".$address."' WHERE cus_id = '".$cus_id."'";

$objQuery = mysqli_query($dbconfig, $sql);
	if($objQuery){
    echo "<script>
    alert('แก้ไขข้อมูลของลูกค้ารหัส : ".$cus_id." เรียบร้อยแล้ว!');
    window.location.href='search_customer.php';
    </script>";
  }

 ?>
