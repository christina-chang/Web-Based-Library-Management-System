<?php 
	if($_REQUEST['category']||$_REQUEST['title']||$_REQUEST['author']||$_REQUEST['press']||$_REQUEST['year']||$_REQUEST['price'])
		setcookie("print", 1, time()+3600);
	else
		setcookie("print", 0, time()+3600);

	
		echo "<script language='javascript' type='text/javascript'>";
		echo "window.location.href='search.php'";
		echo "</script>";
	?>
	
	<?php
			$con = mysql_connect("localhost","root","");
			if (!$con){
			die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("library", $con);

			$result = mysql_query("SELECT * FROM card");

			echo "<table border='1'>
					<tr>
						<th>Cno</th>
						<th>Name</th>
						<th>Department</th>
						<th>Type</th>
						</tr>";

			while($row = mysql_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>" . $row['cno'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['department'] . "</td>";
				echo "<td>" . $row['type'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";

			
			mysql_close($con);
			?>