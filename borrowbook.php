<?php
session_start(); 
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("library", $con);

$bookNO=$_REQUEST['bno'];
$BorR=$_REQUEST['dobook'];
$cardNO=$_SESSION['cno'];
$operator=$_SESSION['ID'];    //?????????????????
$date=date("Y-m-d");

if($BorR=="borrowbook"){
	//echo "borrow";
	$anybook=mysql_query("SELECT stock
				FROM book
				WHERE bno = '$bookNO'
				");

	$row=mysql_fetch_array($anybook);
	
	if($row){
		if($row[stock]>0){
			//echo "yes";
			$sql=mysql_query("UPDATE book SET stock=stock-1 WHERE bno='$bookNO'");
			//echo "$bookNO"." "."$cardNO"." "."$date"." "."$operator";
			$sql=mysql_query("INSERT INTO borrow(bno,cno,borrow_date,return_date,ID) 
			VALUES('$bookNO','$cardNO','$date',0,'$operator')");
			$_SESSION['BorR']="borrow1";
			$_SESSION['message']="Borrow book successful!";
		}
		else{
		echo "NO";
		$late=mysql_query("SELECT borrow_date
				FROM borrow
				WHERE bno = '$bookNO'
				");
		$roww=mysql_fetch_array($late);
		$d = strtotime($roww[borrow_date]);
		$nextday = date("Y-m-d",$d + 30*60*60*24);
		
		$_SESSION['BorR']="borrow2";
		$_SESSION['message']="The book has no stock!";
		$_SESSION['time']=$nextday;
		//echo $_SESSION['message'];
		//echo " ".$_SESSION['time'];
		}
	}
	else{
		$_SESSION['BorR']="borrow1";
		$_SESSION['message']="There is no such a book in the library!";
	}
}
else if($BorR=="returnbook"){
	//echo "return";
	$jilu=mysql_query("SELECT *
				FROM borrow
				WHERE bno = '$bookNO' AND cno = '$cardNO' AND return_date=0 ");
				
	$row=mysql_fetch_array($jilu);
	//print_r($row);
	if($row){
		$sql=mysql_query("UPDATE borrow SET return_date='$date' WHERE bno = '$bookNO' AND cno = '$cardNO' ");
		$sql=mysql_query("UPDATE book SET stock=stock+1 WHERE bno='$bookNO'");
		$_SESSION['BorR']="return";
		$_SESSION['message']="Return book successful!";
	}
	else{
		$_SESSION['BorR']="return";
		$_SESSION['message']="Error: You haven't borrowed this book!";
	}
}

		$url = "borrow.php";
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='$url'";
		echo "</script>";

mysql_close($con);
?>