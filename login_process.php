<?php include './dbconfig.php';

session_start();
$strSQL = "SELECT * FROM user_master WHERE username='$_POST[txtUsername]' and password='$_POST[txtPassword]'";
/*
echo $strSQL;
*/
$objQuery = mysqli_query($dbconfig, $strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
			header("location:login.php");
	}
	else
	{
			$_SESSION["UserID"] = $objResult["username"];
      $_SESSION["fullname"] = $objResult["fullname"];
			$_SESSION["position"] = $objResult["position"];
			$_SESSION["tel"] = $objResult["tel"];
			$_SESSION["email"] = $objResult["email"];
			$_SESSION["rolee"] = $objResult["rolee"];
			session_write_close();

			echo $objResult["username"].$objResult["fullname"].$objResult["position"].$_SESSION["rolee"];
      header("location:index.php");
	}

?>
