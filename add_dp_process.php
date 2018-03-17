<?php
include './dbconfig.php';

$user = $_GET['txtUName'];
$ddate = $_GET['txtDate'];

$a = date("Y")+543;
$year = substr($a,2);
$sid = "SSA".$year.date("m")."-";
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

  /*ตรวจสอบเลขหลักแรก = 0XX*/
  if($p1==0){
    /*ตรวจสอบเลขหลักสอง = 00X */
    if($p2==0){
      $x = $p3+1;
      /*ตรวจสอบผลการบวกเลข = 01X */
      if($x>=10){
        $id = "SSA".$year.date("m")."-"."0".$x;
      }else {
        $id = "SSA".$year.date("m")."-"."00".$x;
      }
    }else {
      $x = ($p2.$p3)+1;
      if($x>=100){
        $id = "SSA".$year.date("m")."-".$x;
      }else {
        $id = "SSA".$year.date("m")."-"."0".$x;
      }
    }
  }else {
    $x = $cusid+1;
    $id = "SSA".$year.date("m")."-".$x;
  }
}

echo $id.$user.$ddate;
$sqlinst = "INSERT INTO pv_master (id, name, create_date, pv_status, is_del)";
$sqlinst .= " VALUES ('$id','$user','$ddate',1,0)";

$objQuery2 = mysqli_query($dbconfig, $sqlinst);

if ($objQuery2) {
  session_start();
  $_SESSION["pvid"] = $id;

    echo "<script>window.location.href='add_dp_detail.php?id=".$id."';</script>";
} else {
    echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ');window.location.href='add_dp.php';</script>";
  }

 ?>
