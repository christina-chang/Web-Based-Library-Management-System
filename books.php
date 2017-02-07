<?php
	$con = mysql_connect("localhost","root","");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("library", $con);
	mysql_query("SET NAMES utf-8");
	
	
	if(file_exists("book/book.txt")){
	//echo "111";
	$file = file("book/book.txt");
	//print_r(file("book/book.txt"));


    $num=count($file);
    for($i=0;$i<$num;$i++){
    
        $uparr=explode(",",$file[$i]);
        $ISBN=$uparr[0];
        $category=$uparr[1];
		$title=$uparr[2];
		$author=$uparr[3];
		$publisher=$uparr[4];
		$year=$uparr[5];
		$price=$uparr[6];
		$amount=$uparr[7];
		
		$where="bno='$ISBN' and category='$category' and title='$title' and author='$author'
	and press='$publisher' and year='$year' and price='$price'";

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
    }
	}

	$url = "store.php";
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
	
mysql_close($con)
?>