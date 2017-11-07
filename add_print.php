<?php include './header.php'; ?>
<?php include './navbar.php'; ?>

<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">บันทึกการใช้งานเครื่องปริ้น SAMSUNG CLX-92x1</h2>
                <div class="row" style="padding-top: 30px;">
                    <div class="col-md-4 col-xs-4"></div>
                    <div class="col-md-4 col-xs-4">
                        <form action="add_printprocess.php" onsubmit="return confirm('Do you really want to submit the form?');" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label>ผู้ยื่นคำขอ</label>
                                    <input class="form-control" value="<?php echo $_SESSION["fullname"]; ?>" type="text" readonly="">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-4">
                                            <label>จำนวน (แผ่น)</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-file-text"></i></span>
                                                <input  id="txtQty" name="txtQty" type="number" class="form-control" placeholder="1" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <label>ขนาดกระดาษ</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-sliders"></i></span>
                                                <select class="form-control" name="txtSize" id="select-1" required="">
                                                    <option value="1">A4</option>
                                                    <option value="2">A3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-4">
                                            <label>รูปแบบ</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-low-vision"></i></span>
                                                <select class="form-control" name="txtColor" id="select-1" required="">
                                                    <option value="1">ขาวดำ</option>
                                                    <option value="2">สี</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>ประเภทเอกสาร</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags"></i></span>
                                        <select class="form-control" name="txtType" id="select-1" required="">
                                            <option value="1">ทั่วไป</option>
                                            <option value="2">เอกสารส่งงาน Taxi</option>
                                            <option value="3">เอกสารส่งงาน 57 กล้อง</option>
                                            <option value="4">เอกสารส่งงานอื่นๆ</option>
                                            <option value="5">เอกสารทางบัญชี</option>
                                            <option value="6">เอกสารงานแบบทั่วไป</option>
                                            <option value="7">เอกสารงานกราฟฟิค</option>
                                            <option value="8">อื่นๆ</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label>หมายเหตุ</label>
                                    <textarea name="txtRemark" class="form-control" placeholder="กรุณากรอกเหตุผล..." required=""></textarea>
                                </div>
                            </fieldset>
                            <hr>
                            <div style="text-align: left">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save" style="padding-right: 5px;"></i> ยื่นคำขอ</button>
                                <button class="btn btn-danger" type="reset"><i class="fa fa-close" style="padding-right: 5px;"></i> ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-xs-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
