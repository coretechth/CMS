<?php
include './dbconfig.php';
include './header.php';
include './navbar.php';

$sqlAllcus = "SELECT * FROM customer_master WHERE Is_del = 0";
$objQuery = mysqli_query($dbconfig, $sqlAllcus);

?>
<script language="javascript">
var w = 650, // width of your block
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
                  <div class="col-md-4 col-xs-12"></div>
                    <div class="col-md-4 col-xs-12">
                        <form action="" onsubmit="return confirm('Do you really want to submit the form?');">
                            <fieldset>
                                <div class="form-group">
                                    <label>ผู้เปิดรายงาน</label>
                                    <input class="form-control" value="<?php echo $_SESSION["fullname"]; ?>" type="text" readonly="">
                                </div>
                                <div class="form-group">
                                    <label>ลูกค้า/โครงการ</label>
                                    <div class="">
                                      <input class="form-control" type="text" readonly="" style="width:90%; display: inline;" >
                                      <a href="#" class="btn btn-default" onclick="OpenPopup()">...</a>
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
                            <div style="text-align: left">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save" style="padding-right: 5px;"></i> ยื่นคำขอ</button>
                                <button class="btn btn-danger" type="reset"><i class="fa fa-close" style="padding-right: 5px;"></i> ยกเลิก</button>
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
