<?php
include './dbconfig.php';
include './header.php';
/*$id = $_REQUEST['job_id'];*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>A4</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
  <style>@page { size: A4 }
  .textDD{
    display: inline;
      border-bottom: 1px dotted;
      padding: 0px 30px 0px 30px;
  }
  </style>
</head>
<body class="A4">
  <section class="sheet padding-10mm">
    <article>
          <div class="row" style="font-size:30px; text-align:center;">
            <div class="col-md-1" style="padding: 0px;text-align: left;"><img src="images\ico.png" alt="" style="width: 70px;"></div>
            <div class="col-md-5" style="font-size: 20px; text-align: left; padding-right: 0px;">
              <div class="">บริษัท คอร์เทค คอร์ปอเรชั่น จำกัด</div>
              <div class="" style="font-size: 14px;">36/167 ถ.มอเตอร์เวย์ แขวงคลองสองต้นนุ่น เขตลาดกระบัง กรุงเทพฯ 10520</div>
              <div class="" style="font-size: 14px;">โทร. 02-291-6684  แฟ็กซ์. 02-291-6682</div>
            </div>
            <div class="col-md-6" style="border: 1px solid; padding: 10px; background: #efefef;">รายการเบิกค่าใช้จ่ายโครงการ</div>
          </div>
          <div class="row" style="margin-top:10px; font-size:17px;">
            <div class="col-md-5" style="border: 1px solid; padding: 0px;">
              <div class="col-md-3" style="padding: 0px;text-align: center;border-right: 1px solid;">ชื่อผู้เบิก</div>
              <div class="col-md-8" style="text-align: center;">สุกัญญา เปี่ยนขุนทศ</div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6" style="border: 1px solid; text-align:center; font-size: 16px;">
              ในโครงการซื้อพร้อมติดตั้งกล้องโทรทัศน์วงจรปิด ณ ทสภ. (CCTV Phase II)
            </div>
          </div>
          <div class="row" style="margin-top:10px; font-size:17px;">
            <table border="1" width="100%"  style="text-align:center">
              <tr>
                <td style="width:50px;">ลำดับที่</td>
                <td style="width:120px;">วัน เดือน ปี</td>
                <td>รายการ</td>
                <td style="width:100px;">จำนวนเงิน</td>
              </tr>
              <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr style="font-size: 18px; font-weight: 700;">
                <td colspan="3" style="text-align:right; padding-right:10px;">รวม</td>
                <td style="background-color: #e4e4e4;">1,200.00</td>
              </tr>
            </table>
          </div>
          <div class="row" style="margin-top:60px;">
            <div class="col-md-7"></div>
            <div class="col-md-5" style="text-align:right">
              <div class="">ลงชื่อ ................................. ผู้อนุมัติ</div>
              <div style="padding-right: 47px;">( ณัฏฐวัจน์ เชี้ยวบางยาง )</div>
            </div>
          </div>
          <div class="row" style="border: 1px solid; margin-top:30px; text-align:center; padding: 10px; font-size:30px;">
            ใบเบิกเงินสดย่อย
          </div>
          <div class="row" style="text-align:right; margin-top:20px">
            เลขที่..........................
          </div>
          <div class="row" style="text-align:right;">
            วันที่.......เดือน.................พ.ศ........
          </div>
          <div class="row" style="">
            <div class="col-md-1"></div>
            <div class="col-md-1">ข้าพเจ้า</div>
            <div class="col-md-6" style="padding-left: 0px;border-bottom: 1px dotted; text-align:center">
              <div style="">กัญญาวีร์ พงษ์ไพบูลย์</div>
            </div>
            <div class="col-md-1" style="padding:0px;">ตำแหน่ง</div>
            <div class="col-md-3" style="padding-left: 0px;border-bottom: 1px dotted; text-align:center">เลขานุการ</div>
          </div>
          <div class="row" style="padding-top:5px;">
            <div style="width:60px; display:inline;">หน่วยงาน</div>
            <div style="border-bottom: 1px dotted #000; display:inline; color: #fff;">++++++++++++++++++++++++++++++++</div>
            <div style="text-align:right; display:inline;">ได้ใช้จ่ายไปเพื่อการดำเนินงานในนามของบริษัท คอร์เทค คอร์คอร์ปอเรชั่น จำกัด</div>
          </div>
          <div class="row" style="padding-top:5px;">
            <div class="col-md-2" style="padding: 0px;">ในโปรเจค/โครงการ</div>
            <div class="col-md-10" style="padding-left: 0px;border-bottom: 1px dotted; text-align:center"> CCTV Phase II</div>
          </div>
          <div class="row" style="padding-top:5px;">
            <div class="col-md-1" style="padding: 0px;">เป็นจำนวนเงิน</div>
            <div class="col-md-1" style="padding-left: 0px;border-bottom: 1px dotted; text-align:center">2000</div>
          </div>
          <div class="row" style="margin-top:20px">
            <table border="1" width="100%"  style="text-align:center">
              <tr>
                <td style="width:50px;">ลำดับที่</td>
                <td style="width:120px;">วัน เดือน ปี</td>
                <td>รายการ</td>
                <td>เหตุผล</td>
                <td style="width:100px;">จำนวนเงิน</td>
              </tr>
              <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr style="font-size: 18px; font-weight: 700;">
                <td colspan="4" style="text-align:right; padding-right:10px;">รวม</td>
                <td style="background-color: #e4e4e4;">1,200.00</td>
              </tr>
            </table>
          </div>
          <div class="row" style="margin-top:30px;">
            <div class="col-md-4" style="border: 1px solid;">
              ลงชื่อ.............................ผู้เบิกเงิน <br> วันที่......เดือน.................พ.ศ.......
            </div>
            <div class="col-md-4" style="border: 1px solid;">
              ลงชื่อ..................................บัญชี <br> วันที่......เดือน.................พ.ศ.......
            </div>
            <div class="col-md-4" style="border: 1px solid;">
              ลงชื่อ...........................ผู้ตรวจสอบ <br> วันที่......เดือน.................พ.ศ.......
            </div>
          </div>
    </article>
  </section>
  <!--<section class="sheet padding-10mm">
    <article>
      <div class="">
        ทดสอบการแสดงผลหน้าที่สอง
      </div>
    </article>
  </section>-->
</body>
</html>
