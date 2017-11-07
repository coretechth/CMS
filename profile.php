<?php include './header.php'; ?>
<?php include './navbar.php'; ?>

<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <div class="row">
                    <h2 style="text-align: center">ข้อมูลส่วนตัว</h2>
                    <div class="row" style="padding-top: 30px;">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="#" onsubmit="return confirm('Do you really want to submit the form?');" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label>ชื่อนาม-สกุล</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                        <input name="txtName" class="form-control" value="<?php echo $_SESSION["fullname"]; ?>" type="text" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>ตำแหน่ง</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-suitcase"></i></span>
                                        <input name="txtPosition" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>อีเมลล์</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
                                        <input name="txtEmail" class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทร</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-phone"></i></span>
                                        <input name="txtTel" class="form-control" type="tel">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>