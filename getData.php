<?php
session_start();
include './dbconfig.php';
include './header.php';
ini_set('display_errors', 1);
	error_reporting(~0);
?>
<script language="javascript">
	function selData(intLine, pDate, tName, list, amount, sid)
	{
		var sPayDate = self.opener.document.getElementById("txtPayd_" +intLine);
		sPayDate.value = pDate;

		var tNamee = self.opener.document.getElementById("txtType_" +intLine);
		tNamee.value = tName;

		var tlist = self.opener.document.getElementById("txtList_" +intLine);
		tlist.value = list;

		var aamount = self.opener.document.getElementById("txtAM_" +intLine);
		aamount.value = amount;

		var sID = self.opener.document.getElementById("txtID_" +intLine);
		sID.value = sid;

		window.close();
	}
</script>
<div class="page-content">
    <div class="row">
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">ค้นหาข้อมูล</h2>

                <div class="row" style="padding-top: 30px;">
                  <div class="col-md-12">
                    <?php
										  $fname = $_SESSION["fullname"];
                      $sqlselCus = "SELECT * FROM cash_master cm INNER JOIN type_master tm ON cm.type_id=tm.type_id WHERE cm.Is_del = 0 AND cm.cash_status = 0 AND cm.emp_name = '$fname'";
                      $objQuery2= mysqli_query($dbconfig, $sqlselCus);
                    ?>
										<div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
													<th scope="col"></th>
                          <th scope="col" width="15%">วันที่</th>
													<th scope="col">ประเภท</th>
                          <th scope="col">รายการ</th>
                          <th scope="col">จำนวนเงิน</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $xt = 0;
                            while ($objResultselCus = mysqli_fetch_array($objQuery2)) {
                            $xt += 1;
														$datee = $objResultselCus["pay_date"];
														$namet = $objResultselCus["type_name"];
														$list = $objResultselCus["list"];
														$amount = $objResultselCus["amount"];
														$cash_id = $objResultselCus["cash_id"];
                            ?>
                        <tr>
													<td style="font-size : 20px; text-align: center;"><!--<a href="#" class="btn btn-primary" role="button" style="margin-right:3px;"><i class="fas fa-search"></i></a>-->
													<a href="#" role="button"
													onclick="selData('<?php echo $_GET["Line"];?>','<?php echo $datee;?>','<?php echo $namet;?>',
													'<?php echo $list;?>','<?php echo $amount;?>','<?php echo $cash_id;?>');">เลือก</a></td>
                          <td><?php echo $datee; ?></td>
													<td><?php echo $namet; ?></td>
                          <td><?php echo $list; ?></td>
                          <td><?php echo $amount; ?></td>
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
