<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
	<style type="text/css">
.shang {
	position: relative;
	bottom: 5px;
}

.shang2{
	position: relative;
	bottom: 90px;
}

.shang3{
	position: relative;
	bottom: 160px;
	color: red;
}

.yanse{
	color: red;
	font-size:1.2em;
}


.wid{
	position: relative;
	left: 30px;

}

.location{
	position: relative;
	left: 460px;
	bottom: 140px;
}

#loginout{
	position: relative;
	left: 318px;
	bottom: 56px;
}

#out{
	position: relative;
	left: 210px;
}

#result
  {
  background-color:#ffffff;
  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
  width:90%;
  border:2px solid #000000;
  border-collapse:collapse;
  }
  
#result thead td 
  {
   font-size:1.3em;
  text-align:center;
  padding-top:5px;
  padding-bottom:4px;
  background-color:#98af21;
  color:#ffffff;
  } 
  
#result, #result tbody td ,#result thead td 
  {
  border:1px solid #ffffff;
  padding:3px 5px 2px 5px;
  }

#result tbody td 
  {
  font-size:1.1em;
  text-align:right;
  padding-top:5px;
  padding-bottom:4px;
  background-color:#A7b942;
  color:#ffffff;
  }

</style>
	
	<script  type="text/javascript">

	function check(){
		if(document.logincard.cno.value==""){
			alert('Please input the the Library Card Number!');
			return false;
		}
	}
	
	function bookcheck(){
		if(document.borrow.bno.value==""){
			alert('Please input the book!');
			return false;
		}	
	}

	</script>
	
  </head>
  <body background="images/bg4.jpg">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="navbar navbar-inverse">
            <div class="navbar-inner">
              <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <div class="nav-collapse collapse">
                  <ul class="nav">
                    <li>
                      <a href="home.html">
                        Home
                        <span class="navbar-unread">1</span>
                      </a>
                    </li>
                    <li>
                      <a href="search.php">
                        Search
                        <span class="navbar-unread">1</span>
						</a>
                    </li>
					<li class="nav">
                      <a href="operate.php">
                        Admin Menu
                      </a>
                      <ul>
                        <li>
						<a href="#">Books Operate</a>
						<ul>
							<li><a href="adminsearch.php">Search Books</a></li>
							<li><a href="store.php">Store Books</a></li>
							<li><a href="borrow.php">Borrow/Return Books</a></li>
						</ul>
						</li>
						<li><a href="operate.php">Library Card Operate</a>
						</li>
                      </ul> <!-- /Sub menu -->
                    </li>
					<li>
                      <a href="http://libweb.zju.edu.cn/libweb">
                        ZJU Library
                        <span class="navbar-unread">1</span>
						</a>
                    </li>
                    <li>
                      <a href="#">
                        Help
                        <span class="navbar-unread">1</span>
                      </a>
                    </li>
					<li id="out">
                      <a href="adminloginout.php">
                        Login Out
                        <span class="navbar-unread">1</span>
                      </a>
                    </li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </div>
          </div>
        </div>
      </div> <!-- /row -->
	  
	  <br/>
	  
		<div>
		<form name="logincard" action="borrow.php" method="post" onSubmit="return check();">
			<label><h4>Please Input the Library Card Number:</h4></label>
				<input type="text" value="" placeholder="cardnumber" name="cno" id="cno"/>
				<input type="submit" value="Login In " class="btn btn-success shang">
		</form>
		<form name="loginout" id="loginout" action="loginout.php" method="post">
			<input type="submit" value="Login Out" class="btn btn-success shang">
		</form>
		</div>
	
		<div class="location">
		<form name="borrow" action="borrowbook.php" method="post" onSubmit="return bookcheck();">
			<div>
			<label><h4>Borrow/Return Book:</h4></label>
				Bno:<input type="text" value="" name="bno" id="bno"/>
				<input type="radio" name="dobook" id="dobook" checked="checked" value="borrowbook" />borrow
				<input type="radio" name="dobook" id="dobook" value="returnbook" />return
				<input type="submit" value="DO" class="btn btn-success shang">
			</div>
		</form>
		
        <?php 
		session_start();
		if($_SESSION['BorR']=="return"){
			echo " <div class='yanse'>".$_SESSION['message']."</div>";
		}
		else if($_SESSION['BorR']=="borrow1"){
			echo " <div class='yanse'>".$_SESSION['message']."</div>";
		}
		else if($_SESSION['BorR']=="borrow2"){
			echo " <div class='yanse'>".$_SESSION['message']."<br/>";
			echo " The latest return date is ".$_SESSION['time'].".</div>";
		}

		?>
		</div>
		
	    <?php 
		session_start();
		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}

		mysql_select_db("library", $con);
		
		$number=NULL;
		$number=$_REQUEST['cno'];
		
		$user = mysql_query("SELECT * FROM card");

		while($row = mysql_fetch_assoc($user))
		{
			if($number==$row['cno']){
				$x=1;
				$_SESSION['cno']=$number;
				$_SESSION['name']=$row['name'];
				unset($_SESSION['BorR']);
				unset($_SESSION['message']);
				unset($_SESSION['time']);
				break;
			}
			else{
				$x=0;
			}
		}
		
		$book=mysql_query("select book.bno,category,title,press,year,author,round(price,2),total,stock
							from book,borrow where cno='$_SESSION[cno]' and book.bno=borrow.bno and return_date=0 order by title");
		//$c=count(array($book),1);

		if($_SESSION['cno']) 
		if($x){
			echo "<div class='shang2'>"."<h4>Card NO: &nbsp;&nbsp;".$_SESSION['cno']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "Name: &nbsp;&nbsp;".$_SESSION['name'];
			echo "</h4>";
			echo "<table id='result'>
				<thead>
					<tr>
						<td>Bno</td>
						<td>Category</td>
						<td>Title</td>
						<td>Press</td>
						<td>Publication Year</td>
						<td>Author</td>
						<td>Price</td>
						<td>Total</td>
						<td>Stock</td>
					</tr></thead>";
			echo "<tbody>";
			while($row = mysql_fetch_assoc($book))
			{
				echo "<tr>";
				echo "<td>".$row['bno']."</td>";
				echo "<td>".$row['category']."</td>";
				echo "<td>".$row['title']."</td>";
				echo "<td>".$row['press']."</td>";
				echo "<td>".$row['year']."</td>";
				echo "<td>".$row['author']."</td>";
				echo "<td>".$row['round(price,2)']."</td>";
				echo "<td>".$row['total']."</td>";
				echo "<td>".$row['stock']."</td>";
				echo "</tr>";
			}
			echo "</tbody><br />"."</div>";
		}
		else{
			if($number)
				echo "<div class='shang3'><h4>The User dosen't exit!</h4></div>";
			//unset($_SESSION['BorR']);
			//unset($_SESSION['message']);
			//unset($_SESSION['time']);
			echo "<div class='shang2'>"."<h4>Card NO: &nbsp;&nbsp;".$_SESSION['cno']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "Name: &nbsp;&nbsp;".$_SESSION['name'];
			echo "</h4>";
			echo "<table id='result'>
				<thead>
					<tr>
						<td>Bno</td>
						<td>Category</td>
						<td>Title</td>
						<td>Press</td>
						<td>Publication Year</td>
						<td>Author</td>
						<td>Price</td>
						<td>Total</td>
						<td>Stock</td>
					</tr></thead>";
			echo "<tbody>";
			while($row = mysql_fetch_assoc($book))
			{
				echo "<tr>";
				echo "<td>".$row['bno']."</td>";
				echo "<td>".$row['category']."</td>";
				echo "<td>".$row['title']."</td>";
				echo "<td>".$row['press']."</td>";
				echo "<td>".$row['year']."</td>";
				echo "<td>".$row['author']."</td>";
				echo "<td>".$row['round(price,2)']."</td>";
				echo "<td>".$row['total']."</td>";
				echo "<td>".$row['stock']."</td>";
				echo "</tr>";
			}
			echo "</tbody><br />"."</div>";
			
		}
	
		mysql_close($con);
	  ?>
		
  </body>
</html>