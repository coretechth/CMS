<?php
include './dbconfig.php';

$user = $_GET['txtUser'];
$id1 = $_GET['txtID_1'];
$id2 = $_GET['txtID_2'];
$id3 = $_GET['txtID_3'];
$id4 = $_GET['txtID_4'];

$sqlinstPC = "INSERT INTO pc_master (pc_id, emp_name, status, create_date, Is_del)";
$sqlinstPC .= " VALUES ('','$user','0',NOW(),0)";
$objQuery = mysqli_query($dbconfig, $sqlinstPC);
if ($objQuery) {
  $lastid = "SELECT pc_id FROM pc_master ORDER by pc_id DESC LIMIT 1";
  $objLID = mysqli_query($dbconfig, $lastid);
  $objResultLID = mysqli_fetch_array($objLID);

  $lasttID = $objResultLID["pc_id"];

  for ($i=1; $i < 5; $i++) {
    $d = $_GET['txtID_'.$i];
    if ($d!="") {
        $sqlinstPCD = "INSERT INTO pc_detail (id, pd_id, cash_id)";
        $sqlinstPCD .= " VALUES ('',$lasttID,$d)";
        $objQuery2 = mysqli_query($dbconfig, $sqlinstPCD);
        if ($objQuery2) {
              echo "<script>alert('บันทึกข้อมูลเรียบร้อย');window.location.href='search_pc.php';</script>";

        }else {
          echo "pc_detail no";
        }
    }
  }
}else {
  echo "บันทึก pc_master ไม่สำเร็จ";
}
/*
$sqlinstPC = "INSERT INTO pc_master (pc_id, emp_name, status, create_date, Is_del)";
$sqlinstPC .= " VALUES ('','$user','0',NOW(),0)";

$objQuery = mysqli_query($dbconfig, $sqlinstPC);
if ($objQuery) {
  $lastid = "SELECT cash_id FROM cash_master ORDER by cash_id DESC LIMIT 1";
  $objLID = mysqli_query($dbconfig, $lastid);
  $objResultLID = mysqli_fetch_array($objLID);
  if ($objResultLID) {
    for ($i=1; $i < 4; $i++) {
      # code...
    }
  }

  echo "<script>alert('บันทึกข้อมูลเรียบร้อย');window.location.href='search_cash.php';</script>";
} else {
    echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ');window.location.href='add_cash.php';</script>";
}
*/
?>
