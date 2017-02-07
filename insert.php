<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("library", $con);

if($_REQUEST['docard']=="add"){
	$sql="INSERT INTO card (cno, name, department, type)
		VALUES('$_REQUEST[cno]','$_REQUEST[name]','$_REQUEST[department]','$_REQUEST[type]')";
}
else{
	$sql="DELETE FROM card WHERE card_number='$_REQUEST[cno]' ";
}

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

		$url = "operate.php";
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='$url'";
		echo "</script>";

mysql_close($con)
?>