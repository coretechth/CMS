<?php include './header.php'; ?>
<?php include './navbar.php'; ?>
<?php include './dbconfig.php' ?>
<script language="JavaScript">
  function chkNum(ele)
  {
    var num = parseFloat(ele.value);
    ele.value = num.toFixed(2);
  }
</script>
<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">ลงบันทึกค่าใช้จ่าย</h2>
                <div class="row" style="padding-top: 30px;">
                    <div class="col-md-3 col-xs-3"></div>
                    <div class="col-md-6 col-xs-6">
                        <form action="add_cash_process.php" onsubmit="return confirm('Do you really want to submit the form?');" method="GET">
                            <fieldset>
                                <div class="form-group">
                                  <?php
                                    $usersel = "SELECT * FROM user_master WHERE rolee = 0 OR rolee = 4 ORDER BY fullname ASC";
                                    $objQuery = mysqli_query($dbconfig, $usersel);
                                  ?>
                                  <label>ผู้สำรอง </label>
                                  <div class="input-group">
                                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags"></i></span>
                                      <select class="form-control" name="txtUName" id="txtUName" required="">
                                        <option value="เงินทดรองจ่าย">เงินทดรองจ่าย</option>
                                        <?php
                                          while ($reusersel = mysqli_fetch_array($objQuery)) {
                                         ?>
                                          <option value="<?php echo $reusersel['fullname']; ?>"><?php echo $reusersel["fullname"]; ?></option>
                                          <?php
                                              }
                                              ?>
                                      </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label>วัน เดือน ปี</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fas fa-file-alt"></i></span>
                                        <input id="txtDate"  name="txtDate" type="date" class="form-control" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <?php
                                      $type = "SELECT * FROM type_master ORDER BY type_name ASC";
                                      $objQuery2 = mysqli_query($dbconfig, $type);
                                  ?>
                                  <label>ประเภท </label>
                                  <div class="input-group">
                                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags"></i></span>
                                      <select class="form-control" name="txtType" id="txtType" required="">
                                        <?php
                                          while ($type2 = mysqli_fetch_array($objQuery2)) {
                                         ?>
                                          <option value="<?php echo $type2['type_id']; ?>"><?php echo $type2["type_name"]; ?></option>
                                          <?php
                                              }
                                              ?>
                                      </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label>รายการ/เหตุผล</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fas fa-file-alt"></i></span>
                                        <input id="txtDetail"  name="txtDetail" type="text" class="form-control" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>จำนวนเงิน</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fas fa-file-alt"></i></span>
                                        <input id="txtAmount" OnChange="JavaScript:chkNum(this)" name="txtAmount" type="text" class="form-control" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>หมายเหตุ</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fas fa-file-alt"></i></span>
                                        <input id="txtRemark"  name="txtRemark" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </fieldset>
                            <hr>
                            <div style="text-align: center">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save" style="padding-right: 5px;"></i> บันทึกข้อมูล</button>
                                <button class="btn btn-danger" type="reset"><i class="fa fa-close" style="padding-right: 5px;"></i> ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 col-xs-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
