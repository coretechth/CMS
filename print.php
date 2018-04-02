<!DOCTYPE html>
<html lang="en">
<?php
session_start();
  include './dbconfig.php';
  $id = $_REQUEST['id'];
?>
<head>
  <meta charset="utf-8">
  <title>พิมพ์ใบเบิกเงินสดย่อย</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="./css/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="./css/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A5 landscape }</style>

  <link rel="stylesheet" href="style.css" />
  <style>
    body   { font-family: serif }
    h1     { font-family: 'THSarabunNew', cursive; font-size: 15pt; line-height: 15mm; text-align: center;}
    h2, h3 { font-family: 'THSarabunNew', cursive; font-size: 24pt; line-height: 7mm }
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
    .conntent{font-family: 'THSarabunNew'; font-size: 12px; text-align: center;}
    .borderunder{border-bottom: 1px dotted; font-weight: 700}
    .pddingtop{padding-top: 10px;}
    @media print{
      #no_print{display:none;}
    }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<?php
  $empname = $_SESSION["fullname"];
  $sqlselCus = "SELECT pc.create_date,  SUM(cm.amount) as amount, pc.pc_id, pc.emp_name, us.position FROM pc_master pc INNER JOIN pc_detail pd";
  $sqlselCus .= " ON pc.pc_id = pd.pd_id INNER JOIN cash_master cm ON pd.cash_id = cm.cash_id INNER JOIN user_master us ON us.fullname = pc.emp_name WHERE pc_id = $id";
  $objQuery2= mysqli_query($dbconfig, $sqlselCus);
  $objResult = mysqli_fetch_array($objQuery2);
  $ddate  = $objResult["create_date"];
?>
<body class="A5 landscape" style="background-color: #fff;">
  <section class="sheet padding-10mm" style="padding-top:20px;">
    <table width="100%" style="border: 1px solid;">
      <tr>
        <td>
          <h1>ใบเบิกเงินสดย่อย</h1>
        </td>
      </tr>
    </table>
    <table width="100%" style="padding-top:5px;">
      <tr class="conntent">
        <td width="100%" style="text-align:right;">เลขที่...............................</td>
      </tr>
    </table>
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
        $eng_date=strtotime($ddate);
?>
    <table width="100%">
      <tr class="conntent">
        <td width="85%" style="text-align:right;">วันที่</td>
        <td class="borderunder" style="font-weight:700"><?php echo /*date("Y-m-d");*/thai_date($eng_date); ?></td>
      </tr>
    </table>
    <table width="100%">
      <tr class="conntent">
        <td width="20%" style="text-align:right;">ข้าพเจ้า</td>
        <td class="borderunder"><?php echo $objResult["emp_name"]; ?></td>
        <td width="5%" style="text-align:right;">ตำแหน่ง</td>
        <td width="30%" class="borderunder"><?php echo $objResult["position"]; ?></td>
      </tr>
    </table>
    <table width="100%">
      <tr class="conntent">
        <td>ได้จ่ายค่าใช้จ่ายไปเพื่อการดำเนินงานในนามของ บริษัท คอร์เทค คอร์ปอเรชั่น จำกัด ในโครงการ</td>
        <td width="255px" class="borderunder">CCTV Phase II</td>
      </tr>
    </table>

    <?PHP
          function m2t($number){
          $number = number_format($number, 2, '.', '');
          $numberx = $number;
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
          //แก้ต่ำกว่า 1 บาท ให้แสดงคำว่าศูนย์ แก้ ศูนย์บาท
          if($numberx < 1)
          {
          	$convert = "ศูนย์" .  $convert;
          }

          //แก้เอ็ดสตางค์
          $len = strlen($numberx);
          $lendot1 = $len - 2;
          $lendot2 = $len - 1;
          if(($numberx[$lendot1] == 0) && ($numberx[$lendot2] == 1))
          {
          	$convert = substr($convert,0,-10);
          	$convert = $convert . "หนึ่งสตางค์";
          }

          //แก้เอ็ดบาท สำหรับค่า 1-1.99
          if($numberx >= 1)
          {
          	if($numberx < 2)
          	{
          		$convert = substr($convert,4);
          		$convert = "หนึ่ง" .  $convert;
          	}
          }
          return $convert;
          }
          ?>

    <table width="100%">
      <tr class="conntent">
        <td width="72px;">เป็นจำนวนเงิน</td>
        <?php
          $x = $objResult["amount"];
         ?>
        <td width="20%" class="borderunder"> <?php echo number_format($x); ?> </td>
        <td width="29px">บาท (</td>
        <td class="borderunder">
          <?php echo m2t($x); ?>
        </td>
        <td>)</td>
        <td style="text-align:left;"> โดยมีรายละเอียดดังนี้</td>
      </tr>
    </table>
    <table width="100%" border="1px solid black" style="border-collapse: collapse; margin:10px 0px 10px 0px;">
      <tr class="conntent" style="background-color: #e8e8e8; line-height: 35px; font-weight:700">
        <td>ลำดับที่</td>
        <td>วัน เดือน ปี</td>
        <td>รายการ</td>
        <td>เหตุผล</td>
        <td>จำนวนเงิน</td>
      </tr>
      <?php
        $sqld = "SELECT * FROM pc_detail pc INNER JOIN pc_master pm ON pc.pd_id = pm.pc_id INNER JOIN cash_master cm ON pc.cash_id = cm.cash_id INNER JOIN type_master tm ON tm.type_id = cm.type_id WHERE pm.pc_id = $id";
        $objQuery = mysqli_query($dbconfig, $sqld);
      ?>
      <?php
          $xt = 0;
          $total = 0;
          while ($objRes = mysqli_fetch_array($objQuery)) {
              $xt += 1;
              $am = $objRes["amount"];
              $dates = date_create($objRes["pay_date"]);
              $total += $am;
              ?>
              <tr class="conntent" style="height: 30px;">
                <td><?php echo $xt; ?></td>
                <td><?php echo date_format($dates,"d/m/Y"); ?></td>
                <td><?php echo $objRes["type_name"]; ?></td>
                <td><?php echo $objRes["list"]; ?></td>
                <td><?php echo $objRes["amount"]; ?></td>
              </tr>
      <?php
          }
          for ($i=$xt; $i < 5; $i++) {
            ?>
            <tr class="conntent" style="height: 30px;">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <?php
          }
          ?>
      <tr class="conntent" style="height: 30px; font-weight:700;">
        <td colspan="4" style="text-align:right; padding-right:10px;">รวม</td>
        <td style="background-color:#e8e8e8;"><?php echo $total; ?></td>
      </tr>
    </table>
    <table width="100%" border="1px solid black" style="border-collapse: collapse;">
      <tr class="conntent">
        <td width="33.33%">
          <div class="pddingtop">  ลงชื่อ.....................................................ผู้เบิกเงิน</div>
          <div class="">วันที่.............เดือน........................พ.ศ.................</div>
        </td>
        <td width="33.33%">
          <div class="pddingtop">  ลงชื่อ..........................................................บัญชี</div>
          <div class="">วันที่.............เดือน........................พ.ศ.................</div>
        </td>
        <td width="33.33%">
          <div class="pddingtop">  ลงชื่อ..................................................ผู้ตรวจสอบ</div>
          <div class="">วันที่.............เดือน........................พ.ศ.................</div>
        </td>
      </tr>
    </table>
    </article> 

  </section>
  <div style="text-align:center">
    <a id="no_print" class="btn btn-default" href="#" onclick='window.print()'>พิมพใบเบิกเงินสดย่อย</a>
    <a id="no_print" href="search_pc.php" style="padding-left:20px;">ย้อนกลับ</a>
  </div>
</body>
</html>
