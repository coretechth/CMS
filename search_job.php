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
                      $sqlselCus = "SELECT * FROM jobs_master WHERE Is_del = 0 AND (job_id LIKE '%$strKeyword%' OR job_title LIKE '%$strKeyword%' OR job_detail LIKE '%$strKeyword%' OR username LIKE '%$strKeyword%' OR contact_name LIKE '%$strKeyword%' or contact_tel LIKE '%$strKeyword%')";
                      $objQuery2= mysqli_query($dbconfig, $sqlselCus);
                    ?>
										<div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">รหัสงาน</th>
                          <th scope="col">รหัสลูกค้า</th>
                          <th scope="col">ชื่องาน</th>
                          <th scope="col">ผู้รับผิดชอบ</th>
                          <th scope="col">สถานะงาน</th>
                          <th scope="col">กำหนดเสร็จ</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $xt = 0;
                            while ($objResultselCus = mysqli_fetch_array($objQuery2)) {
                            $xt += 1;
                            ?>
                        <tr>
                          <td><?php echo $objResultselCus["job_id"]; ?></td>
                          <td><?php echo $objResultselCus["Cus_id"]; ?></td>
                          <td><?php echo $objResultselCus["job_title"]; ?></td>
                          <td><?php echo $objResultselCus["username"]; ?></td>
                          <td><?php echo $objResultselCus["job_status"]; ?></td>
                          <td><?php echo $objResultselCus["job_end"]; ?></td>
                          <td style="font-size : 15px;"><!--<a href="#" class="btn btn-primary" role="button" style="margin-right:3px;"><i class="fas fa-search"></i></a>-->
													<a href="edit_customer.php?id=<?php echo $objResultselCus['job_id']; ?>" class="btn btn-warning" role="button">ดูรายละเอียด</a></td>
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
