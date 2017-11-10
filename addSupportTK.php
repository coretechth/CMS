<?php
include './dbconfig.php';
include './header.php';
include './navbar.php';

$tkID = "TK".date("Y").date("m")."-";
$sqlProjectName = "SELECT * FROM Project"

?>

<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">ระบบงานซัพพอร์ตลูกค้า</h2>
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
                                    <label>ส่วนงาน</label>
                                    <select class="form-control" id="select-1">
                                        <option>งานซ่อมบำรุงรักษา</option>
                                        <option>งานติดตั้งระบบ</option>
                                        <option>งานสำรวจโครงการใหม่</option>
                                        <option>งานการเงินและบัญชี</option>
                                        <option>งานควบคุมจัดส่งสินค้า</option>
                                        <option>งานประชุมทั่วไป</option>
                                        <option>อื่นๆ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>สถานที่</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-map-marker"></i></span>
                                        <input id="txtLocation" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>รายละเอียด</label>
                                    <textarea class="form-control" placeholder="" rows="3"></textarea>
                                </div>
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
