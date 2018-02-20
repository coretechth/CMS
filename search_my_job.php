<?php
include './dbconfig.php';
include './header.php';
include './navbar.php';
?>
<div class="page-content">
    <div class="row">
        <?php include './sidebar.php';
        $name = $_SESSION["fullname"];?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">รายงานซัพพอร์ตของฉัน</h2>
                <div class="row" style="padding-top: 30px;">
                  <div class="col-md-3 col-xs-3"></div>
                  <div class="col-md-6 col-xs-6">
                    <div class="row borderbox" style="margin-top:10px; margin-bottom:20px; text-align:center">
                      <?php
                        $sql1 = "SELECT COUNT(job_status) as a FROM jobs_master WHERE username = '".$name."' AND job_status = '1'";
                        $objQuery1 = mysqli_query($dbconfig, $sql1);
                        $objResult1 = mysqli_fetch_array($objQuery1);

                        $sql2 = "SELECT COUNT(job_status) as a FROM jobs_master WHERE username = '".$name."' AND job_status = '2'";
                        $objQuery2 = mysqli_query($dbconfig, $sql2);
                        $objResult2 = mysqli_fetch_array($objQuery2);

                        $sql3 = "SELECT COUNT(job_status) as a FROM jobs_master WHERE username = '".$name."' AND job_status = '3'";
                        $objQuery3 = mysqli_query($dbconfig, $sql3);
                        $objResult3 = mysqli_fetch_array($objQuery3);

                        $sql4 = "SELECT COUNT(job_status) as a FROM jobs_master WHERE username = '".$name."' AND job_status = '4'";
                        $objQuery4 = mysqli_query($dbconfig, $sql4);
                        $objResult4 = mysqli_fetch_array($objQuery4);
                      ?>
                      <div class="col-md-3 col-xs-3"><div style="color:gray;">เปิดรายงาน (<?php echo $objResult1["a"]; ?>)</div></div>
                      <div class="col-md-3 col-xs-3"><div style="color:#ff8100;">อยู่ระหว่างดำเนินการ  (<?php echo $objResult2["a"]; ?>)</div></div>
                      <div class="col-md-3 col-xs-3"><div style="color:green;">เสร็จเรียบร้อย (<?php echo $objResult3["a"]; ?>)</div></div>
                      <div class="col-md-3 col-xs-3"><div style="color:red;">ยกเลิก  (<?php echo $objResult4["a"]; ?>)</div></div>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-3"></div>
                </div>
                <div class="row" style="padding-top: 30px;">
                  <div class="col-md-12">
                    <?php
                      $perpage = 10;
                      if (isset($_GET['page'])) {
                      $page = $_GET['page'];
                      } else {
                      $page = 1;
                      }

                      $start = ($page - 1) * $perpage;

                      $sqlselCus = "SELECT * FROM jobs_master JM INNER JOIN customer_master CM ON JM.Cus_id = CM.cus_id WHERE JM.Is_del = 0 AND JM.username = '".$name."'  limit {$start} , {$perpage} ";
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
													<a href="job_detail.php?id=<?php echo $objResultselCus['job_id']; ?>&st=my" class="btn btn-info" role="button">ดูรายละเอียด</a></td>
                        </tr>
                        <?php
                            }
                            ?>
                      </tbody>
                    </table>
									</div>
                    <div class="" style="text-align:center; color: gray; font-style: italic;">
                      <?php
											$sql2 = "SELECT * FROM jobs_master JM INNER JOIN customer_master CM ON JM.Cus_id = CM.cus_id WHERE JM.Is_del = 0 AND JM.username = '".$name."'";

											$query2 = mysqli_query($dbconfig, $sql2);
											$total_record = mysqli_num_rows($query2);
											$total_page = ceil($total_record / $perpage);
											?>
											<nav>
												 <ul class="pagination">
													 <li>
														 <a href="search_my_job.php?page=1" aria-label="Previous">
														 <span aria-hidden="true">&laquo;</span>
														 </a>
													 </li>
													 <?php for($i=1;$i<=$total_page;$i++){ ?>
													 <li><a href="search_my_job.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
													 <?php } ?>
													 <li>
													 <a href="search_my_job.php?page=<?php echo $total_page;?>" aria-label="Next">
													 <span aria-hidden="true">&raquo;</span>
													 </a>
													 </li>
												 </ul>
										 	</nav>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
