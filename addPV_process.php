<?php
include './dbconfig.php';
$username = $_GET['txtUName'];
$date = $_GET['txtDate'];
$name = $_GET['txtName'];
$detail = $_GET['txtReson'];
$money = $_GET['txtMoney'];

$sqlintpv = "INSERT INTO pv_master (id, name, list, detail, moneyy, ddate, create_date)";
$sqlintpv .= " VALUES (NULL, '$username', '$name', '$detail', '$money', '$date', NOW())";

$id2 = $_SESSION["idid"];

$objQuery2 = mysqli_query($dbconfig, $sqlintpv);
if ($objQuery2) {
    echo "<script>
alert('บันทึกข้อมูลเรียบร้อยแล้ว');
window.location.href='print_pv.php?id=$id2';
</script>";
} else {
  echo "<script>
alert('บันทึกข้อมูลไม่สำเร็จ');
window.location.href='addPV.php';
</script>";
}
?>
