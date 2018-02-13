<?php
include './dbconfig.php';

$user = $_GET['txtUser'];
$CusID = $_GET['txtCusID'];
$Cuscontact = $_GET['txtCuscontact'];
$Custel = $_GET['txtCustel'];
$JobName = $_GET['txtJobName'];
$JobDetail = $_GET['txtJobDetail'];
$JobEnd = $_GET['txtJobEnd'];
$objLevel = $_GET['objLevel'];

$sid = "JOB".date("Y").date("m")."-";
$sqlidsel = "SELECT * FROM jobs_master WHERE job_id LIKE '".$sid."%' ORDER BY job_id DESC LIMIT 1";

$objQuery = mysqli_query($dbconfig, $sqlidsel);
$row = mysqli_num_rows($objQuery);
$objResult = mysqli_fetch_array($objQuery);

if($row==0){
  $id = $sid."001";
}else {
  $cusid = substr($objResult["job_id"],10);
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
        $id = "JOB".date("Y").date("m")."-"."0".$x;
      }else {
        $id = "JOB".date("Y").date("m")."-"."00".$x;
      }
    }else {
      $x = ($p2.$p3)+1;
      if($x>=100){
        $id = "JOB".date("Y").date("m")."-".$x;
      }else {
        $id = "JOB".date("Y").date("m")."-"."0".$x;
      }
    }
  }else {
    $x = $cusid+1;
    $id = "JOB".date("Y").date("m")."-".$x;
  }
}

$sqlinst = "INSERT INTO jobs_master (job_id, job_title, job_detail, username, Cus_id, contact_name, contact_tel, job_status, job_end, job_level, create_date, Is_del)";
$sqlinst .= " VALUES ('$id','$JobName','$JobDetail','$user','$CusID','$Cuscontact','$Custel',1,'$JobEnd','$objLevel',NOW(),0)";

$objQuery2 = mysqli_query($dbconfig, $sqlinst);
if ($objQuery2) {
    echo "<script>
alert('บันทึกข้อมูลเรียบร้อยแล้ว');
window.location.href='search_job.php';
</script>";
} else {
  echo "<script>
alert('บันทึกข้อมูลไม่สำเร็จ');
window.location.href='add_customer.php';
</script>";
}
 ?>
