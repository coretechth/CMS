<?php include './dbconfig.php';

$detail = $_POST['txtJobUpdate'];
$job_id = $_POST['txtJobidd'];

$sqlinst = "INSERT INTO jobs_detail (job_id, job_detail, create_date, Is_del) ";
$sqlinst .= "VALUES('".$job_id."','".$detail."',NOW(),0)";

$objQuery2 = mysqli_query($dbconfig, $sqlinst);
if ($objQuery2) {
    $sqlUpdateStatus = "UPDATE jobs_master SET job_status = '2' WHERE job_id = '".$job_id."'";
    $objQuery3 = mysqli_query($dbconfig, $sqlUpdateStatus);
    if($objQuery3){
      echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location.href='job_detail.php?id=$job_id';</script>";
    }else {
      echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ');window.location.href='job_detail.php?id=$job_id';</script>";
    }
}

?>
