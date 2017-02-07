<?php 
	setcookie("user",NULL, time()+3600);
	if($_REQUEST['cardnumber'])
		setcookie("user","$_REQUEST[cardnumber]", time()+3600);
		
	$url = "borrow.php";
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
?>