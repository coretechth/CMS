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
	}else {
		$strKeyword = date("Y-m-d");
	}
?>
<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">ข้อมูลรายการเบิกเงินสดย่อย</h2>
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
                        $empname = $_SESSION["fullname"];
                        $sql = "SELECT SUM(cm.amount) as amount FROM pc_detail pd INNER JOIN pc_master pm ON pd.pd_id = pm.pc_id INNER JOIN cash_master cm ON pd.cash_id = cm.cash_id WHERE pm.status != 2 AND cm.emp_name = '$empname' AND pm.Is_del = 0";
                        $objQuery = mysqli_query($dbconfig, $sql);
                      	$objResult = mysqli_fetch_array($objQuery);
                        $amontt  = $objResult["amount"];
                      ?>
                      <h3>รวมยอดค่าใช้จ่ายที่ค้างชำระจำนวน <?php echo number_format($amontt);; ?> บาท</h3>
                    </div>
                  </div>
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

                      $sqlselCus = "SELECT pm.pc_id, pm.status, pm.create_date, pm.emp_name, SUM(cm.amount) as amount FROM pc_detail pd INNER JOIN pc_master pm ON pd.pd_id = pm.pc_id INNER JOIN cash_master cm ON pd.cash_id = cm.cash_id";
											$sqlselCus .= " WHERE cm.emp_name = '".$empname."' AND pm.Is_del = 0 GROUP BY pm.pc_id ORDER BY pm.status ASC limit {$start} , {$perpage} ";
                      $objQuery2= mysqli_query($dbconfig, $sqlselCus);
                    ?>
										<div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">สถานะ</th>
                          <th scope="col">วันที่</th>
                          <th scope="col">ชื่อผู้เบิก</th>
													<th scope="col">ยอดเงิน</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $xt = 0;
                            while ($objResultselCus = mysqli_fetch_array($objQuery2)) {
															$cdate = date_create($objResultselCus["create_date"]);
															if ($objResultselCus['pc_id']!=NULL) {
																$xt += 1;
																$status = $objResultselCus["status"];
																$idlink = $objResultselCus['pc_id'];
																if ($status==0) {
																	$txtStatus = '<div style="color:gray;">สร้างเอกสาร</div>';
																	$ajbtn = '<a href="update_pc.php?id='.$idlink.'&type=1" class="btn btn-warning"><i class="fas fa-level-up-alt" style="padding-right:5px"></i> ยื่นเบิก</a>';
																}elseif ($status==1) {
																	$txtStatus = '<div style="color:#ff8100;">ยื่นเบิก</div>';
																	$ajbtn = '<a href="update_pc.php?id='.$idlink.'&type=2" class="btn btn-success"><i class="fas fa-check" style="padding-right:5px"></i> รับเงิน</a>';
																}elseif ($status==2) {
																	$txtStatus = '<div style="color:green;">รับเงินแล้ว</div>';
																	$ajbtn = "";
																}
																?>
																<tr style="text-align:center;">
																	<td><?php echo $txtStatus; ?></td>
																	<td><?php echo date_format($cdate,"d/m/Y"); ?></td>
																	<td><?php echo $objResultselCus["emp_name"]; ?></td>
																	<td><?php echo number_format($objResultselCus["amount"]); ?></td>
																	<td>
																		<?php echo $ajbtn; ?>
																		<a href="print.php?id=<?php echo $objResultselCus['pc_id']; ?>" class="btn btn-info" role="button">
																			<i class="fas fa-print" style="padding-right:5px"></i>พิมพ์ใบเบิก</a>
																	</td>
																</tr>
																<?php
															}
                            ?>

                        <?php
                            }

                            ?>
                      </tbody>
                    </table>
									</div>
                    <div class="" style="text-align:center; color: gray; font-style: italic;">
											<?php
											$sql2 = "SELECT pm.pc_id, pm.status, pm.create_date, pm.emp_name, SUM(cm.amount) as amount FROM pc_detail pd INNER JOIN pc_master pm ON pd.pd_id = pm.pc_id INNER JOIN cash_master cm ON pd.cash_id = cm.cash_id";
											$sql2 .= " WHERE cm.emp_name = '".$empname."' GROUP BY pm.pc_id ORDER BY pm.status ASC";

											$query2 = mysqli_query($dbconfig, $sql2);
											$total_record = mysqli_num_rows($query2);
											$total_page = ceil($total_record / $perpage);
											?>
											<nav>
												 <ul class="pagination">
													 <li>
														 <a href="search_pc.php?page=1" aria-label="Previous">
														 <span aria-hidden="true">&laquo;</span>
														 </a>
													 </li>
													 <?php for($i=1;$i<=$total_page;$i++){ ?>
													 <li><a href="search_pc.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
													 <?php } ?>
													 <li>
													 <a href="search_pc.php?page=<?php echo $total_page;?>" aria-label="Next">
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
