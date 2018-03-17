<?php include './header.php'; ?>
<?php include './navbar.php'; ?>
<?php include './dbconfig.php' ?>

<div class="page-content">
    <div class="row">
        <?php include './sidebar.php'; ?>
        <div class="col-md-10">
            <div class="content-box-large">
                <h2 style="text-align: center;">ใบเบิกเงินสดย่อย</h2>
                <div class="row" style="padding-top: 30px;">
                    <div class="col-md-3 col-xs-3"></div>
                    <div class="col-md-6 col-xs-6">
                      <?php
                        $id = "SELECT * FROM pv_master ORDER BY id DESC LIMIT 1";
                        $obj = mysqli_query($dbconfig, $id);
                        $objResult = mysqli_fetch_array($obj);
                        $_SESSION["idid"] = $objResult["id"];
                        if(!$objResult)
                        {
                          $_SESSION["idid"] = 1;
                        }
                      ?>
                        <form action="add_dp_process.php" onsubmit="return confirm('Do you really want to submit the form?');" method="GET">
                            <fieldset>
                                <div class="form-group">
                                  <?php
                                    $usersel = "SELECT * FROM user_master WHERE rolee = 0 ORDER BY fullname ASC";
                                    $objQuery = mysqli_query($dbconfig, $usersel);
                                  ?>
                                  <label>ชื่อ-นามสกุล </label>
                                  <div class="input-group">
                                      <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-tags"></i></span>
                                      <select class="form-control" name="txtUName" id="txtUName" required="">
                                        <?php
                                          while ($reusersel = mysqli_fetch_array($objQuery)) {
                                         ?>
                                          <option value="<?php echo $reusersel['username']; ?>"><?php echo $reusersel["fullname"]; ?></option>
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
                            </fieldset>
                            <hr>
                            <div style="text-align: center">
                                <button class="btn btn-success" type="submit"><i class="fa fa-save" style="padding-right: 5px;"></i> เปิดใบเบิก</button>
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
