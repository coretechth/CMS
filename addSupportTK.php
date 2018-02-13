<?php
include './dbconfig.php';
include './header.php';
include './navbar.php';

$sqlAllcus = "SELECT * FROM customer_master WHERE Is_del = 0";
$objQuery = mysqli_query($dbconfig, $sqlAllcus);

?>
<script language="javascript">
var w = 500, // width of your block
        h = 500, // height of your block
        l = (screen.width - w)/2, // block left position
        t = (screen.height -h)/2; //block top position

	function OpenPopup()
	{
    window.open('sel_customer.php','myPopup','height=' + h + ',width=' + w + ',top=' + t + ',left=' + l);
		/*window.open('search_customer.php','myPopup','width=650,height=500,toolbar=0, menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');*/
	}

</script>
<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">เปิดรายงาน</h2>
                <div class="row" style="padding-top: 30px;">
                  <div class="col-md-3 col-xs-12"></div>
                    <div class="col-md-6 col-xs-12">
                        <form action="addSupportTK_process.php" onsubmit="return confirm('Do you really want to submit the form?');">
                            <fieldset>
                                <div class="form-group">
                                    <label>ผู้เปิดรายงาน</label>
                                    <input id="txtUser" name="txtUser" class="form-control" value="<?php echo $_SESSION["fullname"]; ?>" type="text" readonly="">
                                </div>
                                <div class="form-group">
                                    <label>ลูกค้า/โครงการ</label>
                                    <div class="">
                                      <input id="txtCusID" name="txtCusID" class="form-control" type="text" readonly="" style="width:94%; display: inline;" required>
                                      <a href="#" class="btn btn-default" onclick="OpenPopup()">...</a>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="input-group">
                                          <span class="input-group-addon" id="sizing-addon2"><i class="fas fa-user"></i></span>
                                          <input id="txtCustomername"  name="txtCustomername" type="text" class="form-control" placeholder="" readonly=""  required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label>ชื่อผู้ติดต่อประสานงาน</label>
                                      <div class="input-group">
                                          <span class="input-group-addon" id="sizing-addon2"><i class="far fa-address-card"></i></span>
                                          <input id="txtCuscontact" name="txtCuscontact" type="text" class="form-control" placeholder="" >
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label>เบอร์โทรผู้ติดต่อประสานงาน</label>
                                      <div class="input-group">
                                          <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                                          <input id="txtCustel"  name="txtCustel" type="text" class="form-control" placeholder="" >
                                      </div>
                                  </div>
                                  <hr>
                                  <div class="form-group">
                                      <label>หัวข้องาน</label>
                                      <div class="input-group">
                                          <span class="input-group-addon" id="sizing-addon2"><i class="fas fa-file-alt"></i></span>
                                          <input id="txtJobName"  name="txtJobName" type="text" class="form-control" placeholder="" >
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label>รายละเอียดงาน </label>
                                      <textarea id="txtJobDetail" name="txtJobDetail" class="form-control" placeholder="กรุณากรอกรายละเอียดงาน..." rows="2" ></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label>กำหนดเสร็จ</label>
                                      <div class="input-group">
                                          <span class="input-group-addon" id="sizing-addon2"><i class="fas fa-file-alt"></i></span>
                                          <input id="txtJobEnd"  name="txtJobEnd" type="date" class="form-control" placeholder="" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label>ระดับความสำคัญ </label>
                                      <select id="objLevel"  name="objLevel" class="form-control">
                                        <option value="1">ปกติ</option>
                                        <option value="2">ปานกลาง</option>
                                        <option value="3">เร่งด่วน</option>
                                        <option value="4">เร่งด่วนมาก</option>
                                      </select>
                                  </div>



                                <!--<div class="form-group">
                                    <label>สถานที่</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-map-marker"></i></span>
                                        <input id="txtLocation" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>รายละเอียด</label>
                                    <textarea class="form-control" placeholder="" rows="3"></textarea>
                                </div>-->
                            </fieldset>
                            <hr>
                            <div style="text-align: center">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save" style="padding-right: 5px;"></i> เปิดรายงาน</button>
                                <a href="index.php" class="btn btn-default"><i class="fas fa-undo-alt" style="padding-right: 5px;"></i> ย้อนกลับ</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 col-xs-12"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
