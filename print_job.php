<?php
include './dbconfig.php';
include './header.php';
$job_id = $_REQUEST['job_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>A4</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
  <style>@page { size: A4 }</style>
</head>
<body class="A4">
  <section class="sheet padding-10mm">
    <article>
      <?php
        $sqlJob = "SELECT * FROM jobs_master JM INNER JOIN customer_master CM ON JM.Cus_id = CM.cus_id WHERE JM.Is_del = 0 AND JM.job_id ='".$job_id."'";
        $objQuery= mysqli_query($dbconfig, $sqlJob);
        $objResult = mysqli_fetch_array($objQuery);
        if($objResult){
          $job = $objResult["job_status"];
          if($job==1){
            $jobst = 'เปิดรายงาน';
          }elseif ($job==2) {
            $jobst = 'อยู่ระหว่างดำเนินการ';
          }elseif ($job==3) {
            $jobst = 'เสร็จเรียบร้อย';
          }elseif ($job==4) {
            $jobst = 'ยกเลิก';
          }

          $e = $objResult["job_end"];
          $today = date("Y-m-d");

          $date1 = new DateTime($e);
          $date2 = new DateTime($today);
          $diff = date_diff($date2,$date1);

          $fullname = $objResult["username"];
          ?>
          <div class="row" style="font-size:30px; text-align:center;">
            <img src="images\ico.png" alt="" style="width: 70px;">
          </div>
          <div class="row" style="font-size:30px; text-align:center;">บริษัท คอร์เทค คอร์ปอเรชั่น จำกัด</div>
          <div class="row" style="font-size:20px; text-align:center; margin-bottom:20px;">36/167 ถ.มอเตอร์เวย์ แขวงคลองสองต้นนุ่น เขตลาดกระบัง กรุงเทพฯ 10520</div>
          <div class="row" style="font-size:30px; text-align:center; margin-bottom:20px;">รายงานการดำเนินงาน</div>

          <div class="row" style="margin-bottom:10px;">
            <div class="col-md-7 col-xs-7" style="padding-left: 0px;">
              <div class="borderbox" style="padding:10px; height: 105px;">
                <div class="row">
                  <div class="col-md-3 col-xs-3" style="text-align:right; padding-right:0px;">รหัสลูกค้า :</div>
                  <div class="col-md-8 col-xs-8" style="text-align:left"><?php echo $objResult["cus_id"]; ?></div>
                </div>
                <div class="row">
                  <div class="col-md-3 col-xs-3" style="text-align:right; padding-right:0px;">ชื่อลูกค้า :</div>
                  <div class="col-md-8 col-xs-8" style="text-align:left"><?php echo $objResult["cus_name"]; ?></div>
                </div>
              </div>
            </div>
            <div class="borderbox col-md-5 col-xs-5" style="padding:10px;">
                <div class="rows">
                  <div class="col-md-4 col-xs-4" style="text-align:right; padding-right:0px;">เลขที่ :</div>
                  <div class="col-md-8 col-xs-8" style="text-align:left"><?php echo $job_id; ?></div>
                </div>
                <div class="rows">
                  <div class="col-md-4 col-xs-4" style="text-align:right; padding-right:0px;">สถานะ :</div>
                  <div class="col-md-8 col-xs-8" style="text-align:left"><?php echo $jobst; ?></div>
                </div>
                <div class="rows">
                  <div class="col-md-4 col-xs-4" style="text-align:right; padding-right:0px;">ผู้ดำเนินงาน :</div>
                  <div class="col-md-8 col-xs-8" style="text-align:left"><?php echo $fullname; ?></div>
                </div>
            </div>
          </div>
          <div class="row borderbox" style="margin-bottom: 10px;">
            <div class="row">

          </div>
        </div>

          <?php
        }
          ?>
    </article>
  </section>
</body>
</html>
