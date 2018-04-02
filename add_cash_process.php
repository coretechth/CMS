<?php
include './dbconfig.php';

$user = $_GET['txtUName'];
$ddate = $_GET['txtDate'];
$type = $_GET['txtType'];
$detail = $_GET['txtDetail'];
$amount = $_GET['txtAmount'];
$remark = $_GET['txtRemark'];
/*
$a = date("Y")+543;
$year = substr($a,2);
$sid = "AOT".$year.date("m")."-";
$sqlidsel = "SELECT * FROM pv_master WHERE id LIKE '".$sid."%' ORDER BY id DESC LIMIT 1";

$objQuery = mysqli_query($dbconfig, $sqlidsel);
$row = mysqli_num_rows($objQuery);
$objResult = mysqli_fetch_array($objQuery);

if($row==0){
  $id = $sid."001";
}else {
  $cusid = substr($objResult["id"],8);
  $p1 = $cusid[0];
  $p2 = $cusid[1];
  $p3 = $cusid[2];

  if($p1==0){
    if($p2==0){
      $x = $p3+1;
      if($x>=10){
        $id = "AOT".$year.date("m")."-"."0".$x;
      }else {
        $id = "AOT".$year.date("m")."-"."00".$x;
      }
    }else {
      $x = ($p2.$p3)+1;
      if($x>=100){
        $id = "AOT".$year.date("m")."-".$x;
      }else {
        $id = "AOT".$year.date("m")."-"."0".$x;
      }
    }
  }else {
    $x = $cusid+1;
    $id = "AOT".$year.date("m")."-".$x;
  }
}
*/
if ($user=='เงินทดรองจ่าย') {
  $sqlinst = "INSERT INTO cash_master (cash_id, emp_name, type_id, list, amount, pay_date, create_date, Is_del, remark, cash_status)";
  $sqlinst .= " VALUES ('','$user','$type','$detail','$amount','$ddate',NOW(),0,'$remark',2)";
}else {
  $sqlinst = "INSERT INTO cash_master (cash_id, emp_name, type_id, list, amount, pay_date, create_date, Is_del, remark)";
  $sqlinst .= " VALUES ('','$user','$type','$detail','$amount','$ddate',NOW(),0,'$remark')";
}

$objQuery2 = mysqli_query($dbconfig, $sqlinst);

if ($objQuery2) {
  echo "<script>alert('บันทึกข้อมูลเรียบร้อย');window.location.href='search_cash.php';</script>";
} else {
    echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ');window.location.href='add_cash.php';</script>";
}?>
