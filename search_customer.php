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
                <h2 style="text-align: center;">ค้นหาข้อมูลลูกค้า/โครงการ</h2>
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
											$perpage = 10;
											if (isset($_GET['page'])) {
											$page = $_GET['page'];
											} else {
											$page = 1;
											}

											$start = ($page - 1) * $perpage;

                      $sqlselCus = "SELECT * FROM customer_master WHERE Is_del = 0 AND (cus_id LIKE '%$strKeyword%' OR permit_id LIKE '%$strKeyword%' OR cus_name LIKE '%$strKeyword%' OR cus_initials LIKE '%$strKeyword%' OR contact_name LIKE '%$strKeyword%' or contact_tel LIKE '%$strKeyword%')  limit {$start} , {$perpage} ";
                      $objQuery2= mysqli_query($dbconfig, $sqlselCus);
                    ?>
										<div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">รหัสลูกค้า</th>
                          <th scope="col">เลขที่สัญญา</th>
                          <th scope="col">ชื่อลูกค้า/โครงการ</th>
                          <th scope="col">ชื่อเรียก</th>
                          <th scope="col">ชื่อผู้ติดต่อ</th>
                          <th scope="col">เบอร์โทร</th>
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
                          <td><?php echo $objResultselCus["cus_id"]; ?></td>
                          <td><?php echo $objResultselCus["permit_id"]; ?></td>
                          <td><?php echo $objResultselCus["cus_name"]; ?></td>
                          <td><?php echo $objResultselCus["cus_initials"]; ?></td>
                          <td><?php echo $objResultselCus["contact_name"]; ?></td>
                          <td><?php echo $objResultselCus["contact_tel"]; ?></td>
                          <td style="font-size : 15px;"><!--<a href="#" class="btn btn-primary" role="button" style="margin-right:3px;"><i class="fas fa-search"></i></a>-->
													<a href="edit_customer.php?id=<?php echo $objResultselCus['cus_id']; ?>" class="btn btn-warning" role="button"><i class="far fa-edit"></i></a></td>
                        </tr>
                        <?php
                            }

                            ?>
                      </tbody>
                    </table>
									</div>
                    <div class="" style="text-align:center; color: gray; font-style: italic;">
											<?php
											$sql2 = "SELECT * FROM customer_master WHERE Is_del = 0 AND (cus_id LIKE '%$strKeyword%' OR permit_id LIKE '%$strKeyword%' OR cus_name LIKE '%$strKeyword%' OR cus_initials LIKE '%$strKeyword%' OR contact_name LIKE '%$strKeyword%' or contact_tel LIKE '%$strKeyword%')";

											$query2 = mysqli_query($dbconfig, $sql2);
											$total_record = mysqli_num_rows($query2);
											$total_page = ceil($total_record / $perpage);
											?>
											<nav>
												 <ul class="pagination">
													 <li>
														 <a href="search_customer.php?page=1" aria-label="Previous">
														 <span aria-hidden="true">&laquo;</span>
														 </a>
													 </li>
													 <?php for($i=1;$i<=$total_page;$i++){ ?>
													 <li><a href="search_customer.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
													 <?php } ?>
													 <li>
													 <a href="search_customer.php?page=<?php echo $total_page;?>" aria-label="Next">
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
