<?php
	$con = mysql_connect("localhost","root","");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("library", $con);
	mysql_query("SET NAMES utf-8");
	
	$ISBN=$_REQUEST['bno'];
	$category=$_REQUEST['category'];
	$title=$_REQUEST['title'];
	$author=$_REQUEST['author'];
	$publisher=$_REQUEST['press'];
	$year=$_REQUEST['year'];
	$price=$_REQUEST['price'];
	$amount=$_REQUEST['total'];
	
	$where="bno='$ISBN' and category='$category' and title='$title' and author='$author'
	and press='$publisher' and year='$year' and price='$price' ";

	$book=mysql_query("SELECT * FROM book WHERE $where");
	$row=mysql_fetch_array($book);
	
	if($row)
		$sql="UPDATE book SET total=total+$amount,stock=stock+$amount WHERE $where";
	else
		$sql="INSERT INTO book (bno,category,title,press,year,author,price,total,stock )
			VALUES('$ISBN','$category','$title','$publisher','$year','$author','$price','$amount','$amount')";


	if (!mysql_query($sql,$con))
	{
		die('Error: ' . mysql_error());
	}

	$url = "store.php";
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";

mysql_close($con)
?>