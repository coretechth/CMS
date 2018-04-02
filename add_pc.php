<?php
include './dbconfig.php';
include './header.php';
include './navbar.php';

$sqlAllcus = "SELECT * FROM customer_master WHERE Is_del = 0";
$objQuery = mysqli_query($dbconfig, $sqlAllcus);

?>
<script language="javascript">
var w = 800, // width of your block
        h = 500, // height of your block
        l = (screen.width - w)/2, // block left position
        t = (screen.height -h)/2; //block top position

	function OpenPopup(intLine)
	{
    window.open('getData.php?Line='+intLine,'myPopup','height=' + h + ',width=' + w + ',top=' + t + ',left=' + l);
		/*window.open('search_customer.php','myPopup','width=650,height=500,toolbar=0, menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');*/
	}

</script>
<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">ใบเบิกเงินสดย่อย</h2>
                <div class="row" style="padding-top: 30px;">
                  <div class="col-md-3 col-xs-12"></div>
                    <div class="col-md-6 col-xs-12">
                        <form action="add_pc_process.php" onsubmit="return confirm('Do you really want to submit the form?');" method="GET">
                            <fieldset>
                                <div class="form-group">
                                    <label>ผู้เปิดรายงาน</label>
                                    <input id="txtUser" name="txtUser" class="form-control" value="<?php echo $_SESSION["fullname"]; ?>" type="text" readonly="">
                                </div>
                                <div class="form-group">
                                    <label>ลูกค้า/โครงการ</label>
                                    <div class="">
                                      <div class="row">
                                        <div class="col-md-2" style="padding-right:2px;">
                                            <input id="txtPayd_1" name="txtPayd_1" class="form-control" type="text" readonly="" style=" display: inline;" required>
                                            <input type="text" id="txtID_1" name="txtID_1" style="display:none">
                                        </div>
                                        <div class="col-md-2" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtType_1" name="txtType_1" class="form-control" type="text" readonly="" style=" display: inline;" required>
                                        </div>
                                        <div class="col-md-5" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtList_1" name="txtList_1"  class="form-control" type="text" readonly="" style=" display: inline;" required>
                                        </div>
                                        <div class="col-md-2" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtAM_1" name="txtAM_1"  class="form-control" type="text" readonly="" style=" display: inline;" required>
                                        </div>
                                        <div class="col-md-1">
                                          <a href="#" class="btn btn-default" style="font-size:12px;" onclick="OpenPopup(1)">...</a>
                                        </div>
                                      </div>
                                      <div class="row" style="padding-top:5px;">
                                        <div class="col-md-2" style="padding-right:2px;">
                                            <input id="txtPayd_2" name="txtPayd_2"  class="form-control" type="text" readonly="" style=" display: inline;" >
                                            <input type="text" id="txtID_2" name="txtID_2" value="" style="display:none">
                                        </div>
                                        <div class="col-md-2" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtType_2" name="txtType_2"  class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-5" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtList_2" name="txtList_2" class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-2" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtAM_2" name="txtAM_2" class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-1">
                                          <a href="#" class="btn btn-default" style="font-size:12px;" onclick="OpenPopup(2)">...</a>
                                        </div>
                                      </div>
                                      <div class="row" style="padding-top:5px;">
                                        <div class="col-md-2" style="padding-right:2px;">
                                            <input id="txtPayd_3" name="txtPayd_3"  class="form-control" type="text" readonly="" style=" display: inline;" >
                                            <input type="text" id="txtID_3" name="txtID_3" value="" style="display:none">
                                        </div>
                                        <div class="col-md-2" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtType_3" name="txtType_3"  class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-5" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtList_3" name="txtList_3" class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-2" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtAM_3" name="txtAM_3" class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-1">
                                          <a href="#" class="btn btn-default" style="font-size:12px;" onclick="OpenPopup(3)">...</a>
                                        </div>
                                      </div>
                                      <div class="row" style="padding-top:5px;">
                                        <div class="col-md-2" style="padding-right:2px;">
                                            <input id="txtPayd_4" name="txtPayd_4"  class="form-control" type="text" readonly="" style=" display: inline;" >
                                            <input type="text" id="txtID_4" name="txtID_4" value="" style="display:none">
                                        </div>
                                        <div class="col-md-2" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtType_4" name="txtType_4"  class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-5" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtList_4" name="txtList_4" class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-2" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtAM_4" name="txtAM_4" class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-1">
                                          <a href="#" class="btn btn-default" style="font-size:12px;" onclick="OpenPopup(4)">...</a>
                                        </div>
                                      </div>
                                      <div class="row" style="padding-top:5px;">
                                        <div class="col-md-2" style="padding-right:2px;">
                                            <input id="txtPayd_5" name="txtPayd_5"  class="form-control" type="text" readonly="" style=" display: inline;" >
                                            <input type="text" id="txtID_5" name="txtID_5" value="" style="display:none">
                                        </div>
                                        <div class="col-md-2" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtType_5" name="txtType_5"  class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-5" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtList_5" name="txtList_5" class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-2" style="padding-right: 2px; padding-left: 2px;">
                                            <input id="txtAM_5" name="txtAM_5" class="form-control" type="text" readonly="" style=" display: inline;" >
                                        </div>
                                        <div class="col-md-1">
                                          <a href="#" class="btn btn-default" style="font-size:12px;" onclick="OpenPopup(5)">...</a>
                                        </div>
                                      </div>
                                    </div>
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
                                  <button class="btn btn-default" type="reset"><i class="fas fa-undo-alt" style="padding-right: 5px;"></i> ล้างข้อมูล</button>
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
