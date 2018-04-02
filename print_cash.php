<!DOCTYPE html>
<html lang="en">
<?php
$a = date("d/m/Y");
?>
<head>
  <meta charset="utf-8">
  <title>สรุปค่าใช้จ่ายประจำวันที่ <?php echo $a; ?></title>
  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="./css/normalize.min.css">
  <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="./css/paper.css">
  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
    @page { size: A4}
      .table-bordered {
        border: 1px solid #000000 !important;
      }
      .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td{
        border: 1px solid #000000 !important;
      }
      table {
        border-collapse: collapse;
      }

      table, td, th {
        border: 1px solid black;
      }
      .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
        border-top: 1px solid #000000 !important;
        text-align: center;
      }
      @media print{
        #no_print{display:none;}
      }

  </style>
  <link rel="stylesheet" href="style.css" />
  <style>
    body   { font-family: serif }
    h1     { font-family: 'THSarabunNew', cursive; font-size: 15pt; line-height: 15mm; text-align: center;}
    h2, h3 { font-family: 'THSarabunNew', cursive; font-size: 12pt; line-height: 7mm }
    h4     { font-size: 32pt; line-height: 14mm }
    h2 + p { font-size: 18pt; line-height: 7mm }
    h3 + p { font-size: 14pt; line-height: 7mm }
    li     { font-size: 11pt; line-height: 5mm }

    h1      { margin: 0 }
    h1 + ul { margin: 2mm 0 5mm }
    h2, h3  { margin: 0 3mm 3mm 0; float: left }
    h2 + p,
    h3 + p  { margin: 0 0 3mm 50mm }
    h4      { margin: 2mm 0 0 50mm; border-bottom: 2px solid black }
    h4 + ul { margin: 5mm 0 0 50mm }
    article { border: 4px double black; padding: 5mm 10mm; border-radius: 3mm }
    .conntent{font-family: 'THSarabunNew'; font-size: 12px; text-align: left;}
    .borderunder{border-bottom: 1px dotted; font-weight: 700}
    .pddingtop{padding-top: 10px;}
  </style>
</head>
<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4" >
  <section class="sheet padding-10mm" style="padding-top:20px;">
    <!--
    <table width="100%">
      <tr>
        <td>
          <img src="images\LOGO.jpg" alt="">
        </td>
      </tr>
    </table>
  -->
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <img src="images\LOGO.jpg" alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <h1 style="text-align:left; font-weight:700">สรุปรายงานค่าใช้จ่ายประจำวัน</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-xs-12 conntent">
        <div>บริษัท คอร์เทค คอร์ปอเรชั่น จำกัด (ส่วนงานสนามบินสุวรรณภูมิ)</div>
        <div>งานซื้อพร้อมติดตั้งกล้องโทรทัศน์วงจรปิด (CCTV) ณ ท่าอากาศยานสุวรรณภูมิ (ทสภ.)</div>
      </div>
    </div>
    <?php
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน",
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"
);
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="".$thai_day_arr[date("w",$time)];
    $thai_date_return.= "".date("j",$time);
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " ".(date("Y",$time)+543);
    $thai_date_return.= "";
    return $thai_date_return;
}
/*$eng_date=time();*/ // แสดงวันที่ปัจจุบัน
$ddate = $_REQUEST['pay'];
$eng_date=strtotime($ddate);
include './dbconfig.php';
?>
      <div class="row">
        <div class="col-md-12 col-xs-12 conntent">
          <div style="font-weight:700; font-size:14px; margin-bottom:10px; margin-top:20px">ประจำวันที่ <?php echo thai_date($eng_date); ?></div>
        </div>
      </div>
      <?php
        $sqlselCus = "SELECT * FROM cash_master cs INNER JOIN type_master tm ON cs.type_id = tm.type_id WHERE cs.Is_del = 0 AND cs.pay_date = '$ddate'";
        $objQuery2= mysqli_query($dbconfig, $sqlselCus);
      ?>
      <table class="table" id="target">
          <tr class="conntent" style="background-color: #e4e4e4 !important; text-align:center">
            <th style="width: 7%;">ลำดับ</th>
            <th scope="col">ประเภท</th>
            <th scope="col">รายการ</th>
            <th scope="col">ผู้สำรองจ่าย</th>
            <th scope="col">จำนวนเงิน</th>
          </tr>
        <?php
            $xt = 0;
            $total = 0;
            while ($objResultselCus = mysqli_fetch_array($objQuery2)) {
            $xt += 1;
            $s = $objResultselCus["amount"];
            $total += $s;
            ?>
        <tr style="text-align:center; font-family:'THSarabunNew'; font-size:12px;">
          <td><?php echo $xt; ?></td>
          <td><?php echo $objResultselCus["type_name"]; ?></td>
          <td><?php echo $objResultselCus["list"]; ?></td>
          <td><?php echo $objResultselCus["emp_name"]; ?></td>
          <td><?php echo number_format($objResultselCus["amount"]); ?></td>
        </tr>
        <?php
            }

            ?>
            <tr style="font-family:'THSarabunNew'; font-size:14px;">
              <td colspan="4" style="font-weight:700; text-align:right">รวมเงิน</td>
              <td style="text-align:center; font-weight:700; background-color: #e4e4e4 !important;"><?php echo number_format($total);?></td>
            </tr>
      </table>
      <div id="no_print" style="font-size:15px; text-align:center;">
        <a href="#" class="btn btn-default" onclick='window.print()'>พิมพ์รายงาน</a>
        <a href="search_cash.php" class="btn btn-default">กลับ</a>
      </div>

    </article>
  </section>
</body>
</html>
