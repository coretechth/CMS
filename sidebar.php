<?php
session_start();
if ($_SESSION['UserID'] == "") {
    header("location:login.php");
}
?>
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <div class="row">
            <div class="col-md-10 col-xs-10">
                <div style="text-align: left; padding-bottom: 10px; padding-left: 10px;">ยินดีต้อนรับ, <a href="profile.php"><?php echo $_SESSION['UserID']; ?></a></div>
            </div>
            <div class="col-md-2 col-xs-2">
                <a onclick="hideMenuSide()" style="padding-right: 20px; color: #333"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <ul id="sidebar" class="nav">
            <li></li>
            <li class="current"><a href="index.php"><i class="fa fa-home"></i> หน้าแรก</a></li>
            <li><a href="forms.php"><i class="fa fa-file-text-o"></i> เอกสารแบบฟอร์ม</a></li>
            <li><a href="profile.php"><i class="far fa-address-card"></i> ข้อมูลส่วนตัว</a></li>

            <li class="submenu">
                <a href="#">
                    <i class="fa fa-clipboard"></i> ระบบงานซัพพอร์ตลูกค้า
                    <span class="caret pull-right"></span>
                </a>
                <ul>
                    <li><a href="addSupportTK.php">เปิดรายงาน</a></li>
                    <li><a href="search_job.php">ดูรายงานทั้งหมด</a></li>
                    <li><a href="search_my_job.php">ดูรายงานของฉัน</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-user"></i> ข้อมูลลูกค้า/โครงการ
                    <span class="caret pull-right"></span>
                </a>
                <ul>
                  <?php
                  if (isset($_SESSION['rolee']) && !empty($_SESSION['rolee'])) {
                    $role = $_SESSION['rolee'];
                      if($role==3){
                        echo '<li><a href="add_customer.php">เพิ่มลูกค้า</a></li>';
                      }
                  }
                  ?>

                    <li><a href="search_customer.php">ค้นหาข้อมูลลูกค้า</a></li>
                </ul>
            </li>
            <li class="submenu">
              <a href="#">
                  <i class="fa fa-clipboard"></i> การเงิน
                  <span class="caret pull-right"></span>
              </a>
              <ul>
                  <li><a href="add_cash.php">ลงบันทึกค่าใช้จ่าย</a></li>
                  <li><a href="add_pc.php">เบิกเงินสดย่อย</a></li>
                  <li><a href="search_cash.php">ดูข้อมูลบันทึกค่าใช้จ่าย</a></li>
                  <li><a href="search_pc.php">ดูข้อมูลเงินสดย่อย</a></li>
              </ul>
            </li>
            <!--
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-print"></i> รายงานการใช้เครื่องปริ้น
                    <span class="caret pull-right"></span>
                </a>
                <ul>
                    <li><a href="add_print.php">บันทึกการใช้งาน</a></li>
                    <li><a href="print_all.php">รายการพิมพ์งานทั้งหมด</a></li>
                    <li><a href="print_our.php">ประวัติการพิมพ์</a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="fa fa-street-view"></i> รายงานออกนอกพื้นที่
                    <span class="caret pull-right"></span>
                </a>
                <ul>
                    <li><a href="add_leav.php">ยื่นคำขอ</a></li>
                    <li><a href="#">รายการทั้งหมด</a></li>
                </ul>
            </li>
            <li><a href="maps.php"><i class="fa fa-building-o"></i> ผู้บริหารและพนักงาน</a></li>
            -->
            <li><a href="logout.php"><i class="fa fa-power-off"></i> ออกจากระบบ</a></li>
        </ul>
    </div>
</div>
