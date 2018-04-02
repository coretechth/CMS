<?php
include './dbconfig.php';
$id = $_REQUEST['id'];
$t = $_REQUEST['type'];

$sql = "UPDATE pc_master SET status = $t, update_date = NOW() WHERE pc_id = $id";
$qry = mysqli_query($dbconfig,$sql);
if ($qry) {
  $sqlcu = "UPDATE cash_master cm INNER JOIN pc_detail pc ON cm.cash_id = pc.cash_id";
  $sqlcu .= " SET cm.cash_status = $t WHERE pc.pd_id = $id";
  $qry2 = mysqli_query($dbconfig,$sqlcu);
  if ($qry2) {
    header('Location:search_pc.php');
  }
}
 ?>
