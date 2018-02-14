<?php
include './dbconfig.php';

$job_id = $_REQUEST['jobid'];
/*
$sqldel = "UPDATE jobs_detail SET Is_del = 1 WHERE jd_id = '".$id."'";

$objQuery = mysqli_query($dbconfig, $sqldel);
    if($objQuery){
      echo "<script>alert('ลบข้อมูลเรียบร้อยแล้ว');window.location.href='job_detail.php?id=$job_id';</script>";
    }else {
      echo "<script>alert('ลบข้อมูลไม่สำเร็จ');window.location.href='job_detail.php?id=$job_id';</script>";
    }
*/
echo $job_id;
 ?>
