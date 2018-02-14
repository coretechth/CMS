<?php
include './dbconfig.php';
include './header.php';
include './navbar.php';

$job_id = $_REQUEST['id'];
?>
<script>
function myFunction() {
    window.print();
}
</script>

<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">รายละเอียดงาน</h2>
                <div class="row" style="padding-top: 30px;padding-bottom: 100px;">
                  <div class="col-md-3 col-xs-12"></div>
                  <div class="col-md-6 col-xs-12">
                    <?php
                      $sqlJob = "SELECT * FROM jobs_master JM INNER JOIN customer_master CM ON JM.Cus_id = CM.cus_id WHERE JM.Is_del = 0 AND JM.job_id ='".$job_id."'";
                      $objQuery= mysqli_query($dbconfig, $sqlJob);
                      $objResult = mysqli_fetch_array($objQuery);
                      if($objResult){
                        $job = $objResult["job_status"];
                        if($job==1){
                          $jobst = '<div style="color:gray;">เปิดรายงาน</div>';
                        }elseif ($job==2) {
                          $jobst = '<div style="color:#ff8100;">อยู่ระหว่างดำเนินการ</div>';
                        }elseif ($job==3) {
                          $jobst = '<div style="color:green;">เสร็จเรียบร้อย</div>';
                        }elseif ($job==4) {
                          $jobst = '<div style="color:red;">ยกเลิก</div>';
                        }

                        $e = $objResult["job_end"];
                        $today = date("Y-m-d");

                        $date1 = new DateTime($e);
                        $date2 = new DateTime($today);
                        $diff = date_diff($date2,$date1);

                        $fullname = $objResult["username"];

                        ?>
                        <div class="row" style="text-align:right; padding-bottom:10px;">
                          <a href="print_job.php?job_id=<?php echo $job_id; ?>" target="popup" class="btn btn-default">
                            <i class="fas fa-print"></i> พิมพ์รายงาน</a>
                        </div>
                        <div class="row borderbox">
                            <h3>ข้อมูลรายการ</h3>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">เลขที่ : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $job_id; ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">สถานะ : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $jobst; ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">ผู้ดำเนินงาน : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $fullname; ?></div>
                            </div>
                        </div>
                        <div class="row borderbox" style="margin-top:20px;">
                            <h3>ข้อมูลลูกค้า</h3>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">รหัสลูกค้า : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $objResult["cus_id"]; ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">ชื่อลูกค้า : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $objResult["cus_name"]; ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">ชื่อย่อ : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $objResult["cus_initials"]; ?></div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">ติดต่อ : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $objResult["contact_name"]; ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">โทร : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $objResult["contact_tel"]; ?></div>
                            </div>
                        </div>
                        <div class="row borderbox" style="margin-top:20px;">
                            <h3>รายละเอียดงาน</h3>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">ชื่องาน : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $objResult["job_title"]; ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">คำอธิบายงาน : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $objResult["job_detail"]; ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">กำหนดเสร็จ : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $objResult["job_end"]; ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">เหลือเวลา : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $diff->format("%a วัน"); ?></div>
                            </div>
                        </div>
                        <div class="row borderbox" style="margin-top:20px;">
                            <h3>ประวัติการรายงานผลการดำเนินงาน</h3>
                            <?php
                              $sqlJobDetail = "SELECT * FROM jobs_detail WHERE job_id = '".$job_id."' AND Is_del = 0";
                              $objQueryJobDetail= mysqli_query($dbconfig, $sqlJobDetail);
                              while ($objResultselCus = mysqli_fetch_array($objQueryJobDetail)) {

                              $ddate = date_create($objResultselCus["create_date"]);
                            ?>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right"><?php echo date_format($ddate,"Y-m-d"); ?></div>
                              <div class="col-md-9 col-xs-5" style="text-align:left"><?php echo $objResultselCus["job_detail"]; ?></div>
                              <div class="col-md-1 col-xs-2" style="text-align:right">
                               <?php   if($_SESSION["fullname"] == $fullname && $job!=3 && $job!=4){?>
                                 ?>
                                 <a href="del_job_detail.php?id=<?php echo $objResultselCus['jd_id']; ?>&jobid=<?php echo $job_id; ?>"
                                   class="btndeljb" onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่?');">ลบ</a>
                                 <?php
                               }?>
                              </div>
                            </div>
                          <?php } ?>
                        </div>
                        <?php
                      }
                    ?>
                    <?php
                      if($_SESSION["fullname"] == $fullname && $job!=3 && $job!=4){?>

                        <div class="row" style="margin-top:20px;">
                          <form method="post" action="add_job_detail.php" onsubmit="return confirm('ต้องการบันทึกความคืบหน้างานใช่หรือไม่?');">
                            <fieldset>
                              <div class="form-group">
                                <label>สถานะงาน</label>
                                <div class="">
                                  <input type="radio" name="status" value="2" checked> อยู่ระหว่างดำเนินการ
                                  <input style="margin-left: 15px;" type="radio" name="status" value="3"> งานเสร็จเรียบร้อย
                                  <input style="margin-left: 15px;" type="radio" name="status" value="4"> ลบงาน
                                </div>
                              </div>
                              <div class="form-group">
                                <textarea id="txtJobUpdate" name="txtJobUpdate" class="form-control" placeholder="กรุณากรอกรายละเอียด" rows="2" required></textarea>
                                <input id="txtJobidd" name="txtJobidd" type="text" name="" value="<?php echo $job_id; ?>" style="display:none">
                              </div>
                            </fieldset>
                            <hr>
                            <div style="text-align: center">
                                <button class="btn btn-success" type="submit"><i class="far fa-edit" style="padding-right: 5px;"></i> บันทึกรายงาน</button>
                                <a href="search_job.php" class="btn btn-default"><i class="fas fa-undo-alt" style="padding-right: 5px;"></i> ย้อนกลับ</a>
                            </div>
                          </form>
                        </div>
                      <?php
                    }else {
                      echo '<hr><div style="text-align: center">';
                      echo '<a href="search_job.php" class="btn btn-default"><i class="fas fa-undo-alt" style="padding-right: 5px;"></i> ย้อนกลับ</a>';
                      echo '</div">';
                    }
                    ?>
                  </div>
                  <div class="col-md-3 col-xs-12"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
