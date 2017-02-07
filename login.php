<?php
session_start(); 
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("library", $con);

$loginname=$_REQUEST['loginname'];
$loginpass=$_REQUEST['loginpass'];
$admin = mysql_query("SELECT ID,password,name FROM librarian");

while($row = mysql_fetch_assoc($admin))
{
	if(($loginname==$row['ID'])&&($loginpass==$row['password'])){
		$url = "operate.php";
		$_SESSION['admin']=$loginname;
		$_SESSION['person']=$row['name'];
		break;
		}
	else{
		$url = "home.html";
		}
}
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='$url'";
		echo "</script>";


mysql_close($con);
?>