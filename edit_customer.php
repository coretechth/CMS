<?php
include './dbconfig.php';
include './header.php';
include './navbar.php';

$cus_id = $_REQUEST['id'];
$strSQL = "SELECT * FROM customer_master WHERE cus_id = '".$cus_id."'";

$objQuery = mysqli_query($dbconfig, $strSQL);
$objResult = mysqli_fetch_array($objQuery);

$permit = $objResult["permit_id"];
$name= $objResult["cus_name"];
$nickname= $objResult["cus_initials"];
$cname= $objResult["contact_name"];
$ctel= $objResult["contact_tel"];
$add= $objResult["address"];

?>
<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">แก้ไขลูกค้า/โครงการ</h2>
                <div class="row" style="padding-top: 30px;">
                  <div class="col-md-4 col-xs-12"></div>
                    <div class="col-md-4 col-xs-12">
                        <form action="edit_customer_process.php" method="post" onsubmit="return confirm('ต้องการแก้ไขข้อมูลใช่หรือไม่?');">
                            <fieldset>
                              <div class="form-group">
                                  <label>รหัสลูกค้า</label>
                                  <input id="txtCusid" name="txtCusid" class="form-control" value="<?php echo $cus_id ?>" type="text" readonly>
                              </div>
                                <div class="form-group">
                                    <label>เลขที่สัญญา</label>
                                    <input id="txtPermit" name="txtPermit" class="form-control" value="<?php echo $permit ?>" type="text" >
                                </div>
                                <div class="form-group">
                                    <label>ชื่อลูกค้า/โครงการ</label>
                                    <textarea id="txtCusname" name="txtCusname" class="form-control" rows="2"><?php echo $name ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>ชื่อย่อ/ชื่อเรียก</label>
                                    <input id="txtCusnickname" name="txtCusnickname" class="form-control" type="text" value="<?php echo $nickname ?>">
                                </div>
                                <div class="form-group">
                                    <label>ที่อยู่</label>
                                    <textarea id="txtCusAdd" name="txtCusAdd" class="form-control" placeholder="" rows="3"><?php echo $add ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>ชื่อผู้ติดต่อประสานงาน</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                        <input id="txtCuscontact" name="txtCuscontact" type="text" class="form-control" placeholder="" value="<?php echo $cname ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทรผู้ติดต่อประสานงาน</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                                        <input id="txtCustel"  name="txtCustel" type="text" class="form-control" placeholder="" value="<?php echo $ctel ?>">
                                    </div>
                                </div>

                            </fieldset>
                            <hr>
                            <div style="text-align: right">
                                <button class="btn btn-warning" type="submit"><i class="far fa-edit" style="padding-right: 5px;"></i> แก้ไขข้อมูล</button>
                                <a href="search_customer.php" class="btn btn-default"><i class="fas fa-undo-alt" style="padding-right: 5px;"></i> ย้อนกลับ</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-xs-12"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
