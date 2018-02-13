<?php
include './dbconfig.php';
include './header.php';
include './navbar.php';
ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;
	if(isset($_POST["txtSerach"]))
	{
		$strKeyword = $_POST["txtSerach"];
	}
?>
<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">ค้นหาข้อมูลรายงาน</h2>
                <div class="row" style="padding-top: 30px;">
                  <div class="col-md-4 col-xs-12"></div>
                    <div class="col-md-4 col-xs-12">
                        <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label>คำค้นหา</label>
                                    <input id="txtSerach" name="txtSerach" class="form-control" value="" type="text" >
                                </div>
                            </fieldset>
                            <div style="text-align: right">
                                <button class="btn btn" type="submit"><i class="fas fa-search" style="padding-right: 5px;"></i> ค้นหา</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-xs-12"></div>
                </div>
                <div class="row" style="padding-top: 30px;">
                  <div class="col-md-12">
                    <?php
                      $sqlselCus = "SELECT * FROM jobs_master JM INNER JOIN customer_master CM ON JM.Cus_id = CM.cus_id WHERE JM.Is_del = 0 AND (JM.job_id LIKE '%$strKeyword%' OR JM.job_title LIKE '%$strKeyword%' OR JM.job_detail LIKE '%$strKeyword%' OR JM.username LIKE '%$strKeyword%' ";
											$sqlselCus .= "OR JM.contact_name LIKE '%$strKeyword%' or JM.contact_tel LIKE '%$strKeyword%' OR CM.cus_name LIKE '%$strKeyword%' OR CM.cus_initials LIKE '%$strKeyword%')";
                      $objQuery2= mysqli_query($dbconfig, $sqlselCus);
                    ?>
										<div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
													<th style="width: 7%;">ความสำคัญ</th>
                          <th scope="col" style="width: 8%;">รหัสงาน</th>
                          <th scope="col" style="width: 8%;">รหัสลูกค้า</th>
													<th scope="col" style="width: 10%;">ชื่อเรียกลูกค้า</th>
                          <th scope="col">ชื่องาน</th>
                          <th scope="col">ผู้ดำเนินงาน</th>
                          <th scope="col">สถานะงาน</th>
                          <th scope="col">กำหนดเสร็จ</th>
													<th scope="col">เหลือเวลา</th>
                          <th scope="col" style="width: 5%;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $xt = 0;
                            while ($objResultselCus = mysqli_fetch_array($objQuery2)) {
                            $xt += 1;
														$job = $objResultselCus["job_status"];
														if($job==1){
															$jobst = '<div style="color:gray;">เปิดรายงาน</div>';
														}elseif ($job==2) {
															$jobst = '<div style="color:#ff8100;">อยู่ระหว่างดำเนินการ</div>';
														}elseif ($job==3) {
															$jobst = '<div style="color:green;">เสร็จเรียบร้อย</div>';
														}elseif ($job==4) {
															$jobst = '<div style="color:red;">ยกเลิก</div>';
														}

														$e = $objResultselCus["job_end"];
														$today = date("Y-m-d");

														$date1 = new DateTime($e);
														$date2 = new DateTime($today);
														$diff = date_diff($date2,$date1);

														/* LEVEL */
														$level = $objResultselCus["job_level"];
														if($level==1){
															$level2 = '<div style="color:#af0000;">เร่งด่วนมาก!!</div>';
														}elseif ($level==2) {
															$level2 = '<div style="color:#ff2f2f;">เร่งด่วน!</div>';
														}elseif ($level==3) {
															$level2 = '<div style="color:#ff8d00;">ปานกลาง</div>';
														}elseif ($level==4) {
															$level2 = '<div>ปกติ</div>';
														}

                            ?>
                        <tr style="text-align:center">
													<td><?php echo $level2; ?></td>
                          <td><?php echo $objResultselCus["job_id"]; ?></td>
                          <td><?php echo $objResultselCus["Cus_id"]; ?></td>
													<td><?php echo $objResultselCus["cus_initials"]; ?></td>
                          <td><?php echo $objResultselCus["job_title"]; ?></td>
                          <td><?php echo $objResultselCus["username"]; ?></td>
                          <td><?php echo $jobst; ?></td>
													<td><?php echo $e; ?></td>
                          <td><?php echo $diff->format("%a วัน"); ?></td>
                          <td style="font-size : 18px;"><!--<a href="#" class="btn btn-primary" role="button" style="margin-right:3px;"><i class="fas fa-search"></i></a>-->
													<a href="job_detail.php?id=<?php echo $objResultselCus['job_id']; ?>" class="btn btn-info" role="button">ดูรายละเอียด</a></td>
                        </tr>
                        <?php
                            }
                            mysqli_close($dbconfig);
                            ?>
                      </tbody>
                    </table>
									</div>
                    <div class="" style="text-align:center; color: gray; font-style: italic;">
                      พบข้อมูลจำนวน <?php echo $xt; ?> แถว
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
