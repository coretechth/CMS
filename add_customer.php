<?php
include './header.php';
include './navbar.php';
?>
<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">เพิ่มลูกค้า/โครงการ</h2>
                <div class="row" style="padding-top: 30px;">
                  <div class="col-md-4 col-xs-12"></div>
                    <div class="col-md-4 col-xs-12">
                        <form action="add_customer_process.php" onsubmit="return confirm('Do you really want to submit the form?');">
                            <fieldset>
                                <div class="form-group">
                                    <label>เลขที่สัญญา</label>
                                    <input id="txtPermit" name="txtPermit" class="form-control" value="" type="text" >
                                </div>
                                <div class="form-group">
                                    <label>ชื่อลูกค้า/โครงการ</label>
                                    <textarea id="txtCusname" name="txtCusname" class="form-control" placeholder="" rows="2" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>ชื่อย่อ/ชื่อเรียก</label>
                                    <input id="txtCusnickname" name="txtCusnickname" class="form-control" value="" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label>ที่อยู่</label>
                                    <textarea id="txtCusAdd" name="txtCusAdd" class="form-control" placeholder="" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>ชื่อผู้ติดต่อประสานงาน</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                        <input id="txtCuscontact" name="txtCuscontact" type="text" class="form-control" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทรผู้ติดต่อประสานงาน</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                                        <input id="txtCustel"  name="txtCustel" type="text" class="form-control" placeholder="" required>
                                    </div>
                                </div>

                            </fieldset>
                            <hr>
                            <div style="text-align: left">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save" style="padding-right: 5px;"></i> บันทึก</button>
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
