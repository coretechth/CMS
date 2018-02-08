<?php include './dbconfig.php';

$permit = $_GET['txtPermit'];
$name = $_GET['txtCusname'];
$nickname = $_GET['txtCusnickname'];
$cname = $_GET['txtCuscontact'];
$address = $_GET['txtCusAdd'];
$tel = $_GET['txtCustel'];

$sqlidsel = "SELECT * FROM customer_master ORDER BY cus_id DESC LIMIT 1";
$objQuery = mysqli_query($dbconfig, $sqlidsel);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
      $cusid = substr($objResult["cus_id"],8);
      $id = "CUS".date("Y")."-";
      $p1 = $cusid[0];
      $p2 = $cusid[1];
      $p3 = $cusid[2];

      /*ตรวจสอบเลขหลักแรก = 0XX*/
      if($p1==0){
        /*ตรวจสอบเลขหลักสอง = 00X */
        if($p2==0){
          $x = $p3+1;
          /*ตรวจสอบผลการบวกเลข = 01X */
          if($x>=10){
            $id = "CUS".date("Y")."-"."0".$x;
          }else {
            $id = "CUS".date("Y")."-"."00".$x;
          }
        }else {
          $x = ($p2.$p3)+1;
          if($x>=100){
            $id = "CUS".date("Y")."-".$x;
          }else {
            $id = "CUS".date("Y")."-"."0".$x;
          }
        }
      }else {
        $x = $cusid+1;
        $id = "CUS".date("Y")."-".$x;
      }


      $sqlinst = "INSERT INTO Customer_master (cus_id, permit_id, cus_name, cus_initials, contact_name, contact_tel, address, cus_status, Is_del)";
      $sqlinst .= " VALUES ('$id','$permit','$name','$nickname','$cname','$tel','$address',1,0)";

      $objQuery2 = mysqli_query($dbconfig, $sqlinst);
      if ($objQuery2) {
          echo "<script>
      alert('บันทึกข้อมูลเรียบร้อยแล้ว');
      window.location.href='search_customer.php';
      </script>";
      } else {
        echo "<script>
    alert('บันทึกข้อมูลไม่สำเร็จ');
    window.location.href='add_customer.php';
    </script>";
  }
      echo $sqlinst;

	}

?>
