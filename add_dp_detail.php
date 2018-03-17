<?php
include './dbconfig.php';
include './header.php';
include './navbar.php';
$pv_id = $_REQUEST['id'];
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
                <h2 style="text-align: center;">ใบเบิกเงินสดย่อย</h2>
                <div class="row" style="padding-top: 30px;padding-bottom: 100px;">
                  <div class="col-md-3 col-xs-12"></div>
                  <div class="col-md-6 col-xs-12">
                    <?php
                      $sqlJob = "SELECT * FROM pv_master pv INNER JOIN user_master um ON pv.name = um.username WHERE pv.id = '".$pv_id."'";
                      $objQuery= mysqli_query($dbconfig, $sqlJob);
                      $objResult = mysqli_fetch_array($objQuery);
                      if($objResult){
                        $job = $objResult["pv_status"];
                        if($job==1){
                          $jobst = '<div style="color:gray;">เปิดรายงาน</div>';
                        }elseif ($job==2) {
                          $jobst = '<div style="color:#ff8100;">ส่งเอกสารให้บัญชี</div>';
                        }elseif ($job==3) {
                          $jobst = '<div style="color:green;">อนุมัติจ่าย</div>';
                        }elseif ($job==4) {
                          $jobst = '<div style="color:red;">รับเงิน</div>';
                        }

                        $fullname = $objResult["fullname"];

                        ?>
                        <div class="row" style="text-align:right; padding-bottom:10px;">
                          <a href="print_job.php?job_id=<?php echo $job_id; ?>" target="popup" class="btn btn-default">
                            <i class="fas fa-print" style="padding-right:5px;"></i>พิมพ์ใบเบิกเงินสดย่อย</a>
                        </div>
                        <div class="row borderbox">
                            <h3>ข้อมูลเอกสาร</h3>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right">เลขที่ : </div>
                              <div class="col-md-10 col-xs-7" style="text-align:left"><?php echo $pv_id; ?></div>
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
                            <h3>รายการเบิก</h3>
                            <?php
                              $sqlJobDetail = "SELECT * FROM pv_detail WHERE pvd_id = '".$pv_id."' AND Is_del = 0";
                              $objQueryJobDetail= mysqli_query($dbconfig, $sqlJobDetail);
                              while ($objResultselCus = mysqli_fetch_array($objQueryJobDetail)) {

                              $ddate = date_create($objResultselCus["pv_date"]);
                            ?>
                            <div class="row">
                              <div class="col-md-2 col-xs-5" style="text-align:right"><?php echo date_format($ddate,"Y-m-d"); ?></div>
                              <div class="col-md-9 col-xs-5" style="text-align:left"><?php echo $objResultselCus["job_detail"]; ?></div>
                              <div class="col-md-1 col-xs-2" style="text-align:right">
                               <?php   if($_SESSION["fullname"] == $fullname && $job!=3 && $job!=4){?>

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

                        <div class="row" style="margin-top:20px;">
                          <form method="post" action="add_job_detail.php" onsubmit="return confirm('ต้องการบันทึกความคืบหน้างานใช่หรือไม่?');">
                            <fieldset>
                              <div class="form-group">
                                <textarea id="txtJobUpdate" name="txtJobUpdate" class="form-control" placeholder="กรุณากรอกรายละเอียด" rows="2" required></textarea>
                                <input id="txtJobidd" name="txtJobidd" type="text" name="" value="<?php echo $job_id; ?>" style="display:none">
                              </div>
                            </fieldset>
                            <hr>
                            <div style="text-align: center">
                                <button class="btn btn-success" type="submit"><i class="far fa-edit" style="padding-right: 5px;"></i> บันทึกรายงาน</button>
                                <?php
                                if ($status='my') {
                                  $url = "#";
                                }else {
                                  $url = "#";
                                } ?>
                                <a href="<?php echo $url; ?>" class="btn btn-default"><i class="fas fa-undo-alt" style="padding-right: 5px;"></i> ย้อนกลับ</a>
                            </div>
                          </form>
                        </div>
                  </div>
                  <div class="col-md-3 col-xs-12"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
