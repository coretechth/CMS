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
                                    <input id="txtSerach" name="txtSerach" class="form-control" value="" type="date" >
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
                  <div class="col-md-12 col-xs-12">
                    <div class="borderbox" style="text-align:center;">
                      <?php
                        if ($strKeyword == null) {
                          $rr = date("d/m/Y");
                        }else {
                          $rr = $strKeyword;
                        }
                        $sql = "SELECT SUM(amount) as ssum FROM cash_master WHERE Is_del = 0 AND pay_date = '$rr'";
                        $objQuery = mysqli_query($dbconfig, $sql);
                      	$objResult = mysqli_fetch_array($objQuery);
                        $amontt  = $objResult["ssum"];
                        if ($amontt != 0) {
                          $monnney = $objResult["ssum"];
                        }else {
                          $monnney = "00";
                        }
                      ?>
                      <h3>รวมยอดค่าใช้จ่ายประจำวันที่ <?php echo $rr; ?></h3>
											<div class="">
												<h3>จำนวนเงิน <?php echo number_format($monnney); ?> บาท</h3>
											</div>
											<a href="add_cash.php" class="btn btn-default">ลงบันทึก</a>
                      <a href="print_cash.php?pay=<?php echo $rr; ?>" class="btn btn-default" target="_blank"><i class="fas fa-print" style="padding-right:5px;"></i> พิมพ์รายงาน</a>
                    </div>
                  </div>
                </div>
                <div class="row" style="padding-top: 30px;">
                  <div class="col-md-12">
                    <?php
											$perpage = 20;
											if (isset($_GET['page'])) {
											$page = $_GET['page'];
											} else {
											$page = 1;
											}

											$start = ($page - 1) * $perpage;

                      $sqlselCus = "SELECT * FROM cash_master cs INNER JOIN type_master tm ON cs.type_id = tm.type_id WHERE cs.Is_del = 0 AND cs.pay_date LIKE '%$strKeyword%' ORDER BY cash_id DESC limit {$start} , {$perpage} ";
                      $objQuery2= mysqli_query($dbconfig, $sqlselCus);
                    ?>
										<div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
													<th style="width: 7%;">ลำดับ</th>
													<th scope="col">สถานะ</th>
                          <th scope="col">วันที่</th>
                          <th scope="col">ประเภท</th>
                          <th scope="col">รายการ</th>
													<th scope="col">จำนวนเงิน</th>
                          <th scope="col">ผู้สำรองจ่าย</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $xt = 0;
                            while ($objResultselCus = mysqli_fetch_array($objQuery2)) {
                            $xt += 1;
														if($objResultselCus["remark"]==""){
															$sq = " ";
														}else {
															$sq = " (".$objResultselCus["remark"].") ";
														}
														$status = $objResultselCus["cash_status"];
														if ($status==0) {
															$txtStatus = '<div style="color:gray;">ยังไม่เบิก</div>';
														}elseif ($status==1) {
															$txtStatus = '<div style="color:#ff8100;">ยื่นเบิก</div>';
														}elseif ($status==2) {
															$txtStatus = '<div style="color:green;">รับเงินแล้ว</div>';
														}
                            ?>
                        <tr style="text-align:center;">
													<td><?php echo $objResultselCus["cash_id"]; ?></td>
													<td><?php echo $txtStatus; ?></td>
                          <td><?php echo $objResultselCus["pay_date"]; ?></td>
                          <td><?php echo $objResultselCus["type_name"]; ?></td>
													<td><?php echo $objResultselCus["list"]." ".$sq; ?></td>
                          <td><?php echo number_format($objResultselCus["amount"]); ?></td>
                          <td><?php echo $objResultselCus["emp_name"]; ?></td>
                          <td>
                            <a href="del_cash.php?id=<?php echo $objResultselCus['cash_id']; ?>" class="btn btn-default" role="button">ลบ</a>
                          </td>
                        </tr>
                        <?php
                            }

                            ?>
                      </tbody>
                    </table>
									</div>
                    <div class="" style="text-align:center; color: gray; font-style: italic;">
											<?php
											$sql2 = "SELECT * FROM cash_master cs INNER JOIN type_master tm ON cs.type_id = tm.type_id WHERE cs.Is_del = 0 AND cs.pay_date LIKE '%$strKeyword%' ORDER BY cash_id DESC";

											$query2 = mysqli_query($dbconfig, $sql2);
											$total_record = mysqli_num_rows($query2);
											$total_page = ceil($total_record / $perpage);
											?>
											<nav>
												 <ul class="pagination">
													 <li>
														 <a href="search_cash.php?page=1" aria-label="Previous">
														 <span aria-hidden="true">&laquo;</span>
														 </a>
													 </li>
													 <?php for($i=1;$i<=$total_page;$i++){ ?>
													 <li><a href="search_cash.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
													 <?php } ?>
													 <li>
													 <a href="search_cash.php?page=<?php echo $total_page;?>" aria-label="Next">
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
