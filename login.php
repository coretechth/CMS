<?php include './header.php'; ?>

<div class="page-content">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="content-box-large">
                <h3 style="text-align: center">กรุณาเข้าสู่ระบบ</h3>
                <form method="post" action="login_process.php">
                    <div class="row" style="padding-top: 20px;">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i></span>
                                    <input id="txtUsername" name="txtUsername" type="text" class="form-control" placeholder="Username" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-lock"></i></span>
                                    <input id="txtPassword" name="txtPassword" type="password" class="form-control" placeholder="Password" required="">
                                </div>
                            </div>
                            <div style="text-align: center; padding-top: 20px;" >
                                <button class="btn btn-default" type="submit"><i class="fa fa-lock" style="padding-right: 10px;"></i>เข้าสู่ระบบ</button>
                            </div>
                            <div style="text-align: center; font-size: 18px; padding-top: 50px;">© 2017 บริษัท คอร์เทค คอร์ปอเรชั่น จำกัด. สงวนสิทธิ์</div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?php include './footer.php'; ?>