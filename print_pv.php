<?php
include './dbconfig.php';
include './header.php';
/*$id = $_REQUEST['job_id'];*/
?>
<?PHP
    function convert($number){
    $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
    $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
    $number = str_replace(",","",$number);
    $number = str_replace(" ","",$number);
    $number = str_replace("บาท","",$number);
    $number = explode(".",$number);
    if(sizeof($number)>2){
    return 'ทศนิยมหลายตัวนะจ๊ะ';
    exit;
    }
    $strlen = strlen($number[0]);
    $convert = '';
    for($i=0;$i<$strlen;$i++){
      $n = substr($number[0], $i,1);
      if($n!=0){
        if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; }
        elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; }
        elseif($i==($strlen-2) AND $n==1){ $convert .= ''; }
        else{ $convert .= $txtnum1[$n]; }
        $convert .= $txtnum2[$strlen-$i-1];
      }
    }

    $convert .= 'บาท';
    if($number[1]=='0' OR $number[1]=='00' OR
    $number[1]==''){
    $convert .= 'ถ้วน';
    }else{
    $strlen = strlen($number[1]);
    for($i=0;$i<$strlen;$i++){
    $n = substr($number[1], $i,1);
      if($n!=0){
      if($i==($strlen-1) AND $n==1){$convert
      .= 'เอ็ด';}
      elseif($i==($strlen-2) AND
      $n==2){$convert .= 'ยี่';}
      elseif($i==($strlen-2) AND
      $n==1){$convert .= '';}
      else{ $convert .= $txtnum1[$n];}
      $convert .= $txtnum2[$strlen-$i-1];
      }
    }
    $convert .= 'สตางค์';
    }
    return $convert;
    }
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
            <div class="col-md-1 col-xs-1" style="padding: 0px;text-align: left;"><img src="images\ico.png" alt="" style="width: 70px;"></div>
            <div class="col-md-5 col-xs-5" style="font-size: 20px; text-align: left; padding-right: 0px;">
              <div class="">บริษัท คอร์เทค คอร์ปอเรชั่น จำกัด</div>
              <div class="" style="font-size: 14px;">36/167 ถ.มอเตอร์เวย์ แขวงคลองสองต้นนุ่น เขตลาดกระบัง กรุงเทพฯ 10520</div>
              <div class="" style="font-size: 14px;">โทร. 02-291-6684  แฟ็กซ์. 02-291-6682</div>
            </div>
            <div class="col-md-6 col-xs-6" style="border: 1px solid; padding: 10px; background: #efefef;">รายการเบิกค่าใช้จ่ายโครงการ</div>
          </div>
          <div class="row" style="margin-top:10px; font-size:17px;">
            <div class="col-md-5 col-xs-5" style="border: 1px solid; padding: 0px;">
              <div class="col-md-3 col-xs-3" style="padding: 0px;text-align: center;border-right: 1px solid;">ชื่อผู้เบิก</div>
              <div class="col-md-8 col-xs-8" style="text-align: center;">สุกัญญา เปี่ยนขุนทศ</div>
            </div>
            <div class="col-md-1 col-xs-1"></div>
            <div class="col-md-6 col-xs-6" style="border: 1px solid; text-align:center; font-size: 16px;">
              ในโครงการซื้อพร้อมติดตั้งกล้องโทรทัศน์วงจรปิด ณ ทสภ. (CCTV Phase II)
            </div>
          </div>
          <div class="row" style="margin-top:10px;">
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
                <td>2</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>3</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>4</td>
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
          <div class="" style="font-size:16px;">
            <div class="row" style="margin-top:20px">
              <div class="col-md-9 col-xs-9"></div>
              <div class="col-md-1 col-xs-1" style="border: 1px solid;">เลขที่</div>
              <div class="col-md-2 col-xs-2" style="border: 1px solid;">SSA6103-001</div>
            </div>
            <div class="row" style="margin-bottom:20px">
              <div class="col-md-9 col-xs-9"></div>
              <div class="col-md-1 col-xs-1" style="border: 1px solid;">วันที่</div>
              <div class="col-md-2 col-xs-2" style="text-align:center; border: 1px solid;"><?php echo date("d/m/y"); ?></div>
            </div>
            <div class="row" style="">
              <div class="col-md-1 col-xs-1"></div>
              <div class="col-md-1 col-xs-1">ข้าพเจ้า</div>
              <div class="col-md-6 col-xs-6" style="padding-left: 0px;border-bottom: 1px dotted; text-align:center">
                <div style="">กัญญาวีร์ พงษ์ไพบูลย์</div>
              </div>
              <div class="col-md-1 col-xs-1" style="padding:0px;">ตำแหน่ง</div>
              <div class="col-md-3 col-xs-3" style="padding-left: 0px;border-bottom: 1px dotted; text-align:center">เลขานุการ</div>
            </div>
            <div class="row" style="padding-top:5px;">
              <div style="text-align:right; display:inline;">ได้ใช้จ่ายไปเพื่อการดำเนินงานในนามของบริษัท คอร์เทค คอร์คอร์ปอเรชั่น จำกัด ในโปรเจค/โครงการ <p style="border-bottom: 1px dotted; display: inline; padding: 0px 61px 0px 62px;">CCTV Phase II</p> </div>
            </div>
            <div class="row" style="padding-top:5px;">
              <div class="col-md-2 col-xs-2" style="padding: 0px;">ในโปรเจค/โครงการ</div>
              <div class="col-md-10 col-xs-10" style="padding-left: 0px;border-bottom: 1px dotted; text-align:center"> CCTV Phase II</div>
            </div>
            <div class="row" style="padding-top:5px;">
              <div style="padding: 0px;     display: inline;">เป็นจำนวนเงิน <p style="border-bottom: 1px dotted; display: inline; padding: 0px 20px 0px 20px;">0,000.00</p> บาท</div>
              <div class="" style="display: inline;">
                (<p style="border-bottom: 1px dotted; display: inline; padding: 0px 20px 0px 20px;"><?php echo convert(145.11); ?></p>) โดยมีรายละเอียดดังนี้
              </div>
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
                  <td>2</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>4</td>
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
            <div class="row" style="margin-top:20px;">
              <div class="col-md-4 col-xs-4" style="border: 1px solid;">
                ลงชื่อ.............................ผู้เบิกเงิน <br> วันที่......เดือน.................พ.ศ.......
              </div>
              <div class="col-md-4 col-xs-4" style="border: 1px solid;">
                ลงชื่อ..................................บัญชี <br> วันที่......เดือน.................พ.ศ.......
              </div>
              <div class="col-md-4 col-xs-4" style="border: 1px solid;">
                ลงชื่อ...........................ผู้ตรวจสอบ <br> วันที่......เดือน.................พ.ศ.......
              </div>
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
