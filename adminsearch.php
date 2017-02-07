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
.you {
	position: relative;
	left: 60px;
}

.wid{
	position: relative;
	left: 30px;
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
	
	<script language="javascript">
	
	function Check(){
    if(document.search.category.value==""&&document.search.title.value==""&&document.search.author.value==""
	&&document.search.press.value==""&&document.search.year.value==""&&document.search.price.value==""){
        alert('Please input search condition!');
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

      <form name="search" action="adminsearch.php" method="post" onSubmit="return Check();">
	  <fieldset>
	  <legend><small>Search Condition</small></legend>
	  <div class="row you">
		Category:
            <input type="text" value="" placeholder="category" class="span2" name="category" id="category"/>       
		&nbsp;&nbsp;Title:
		  <input type="text" value="" placeholder="title" class="span2" name="title" id="title"/>
		&nbsp;&nbsp;Author:
            <input type="text" value="" placeholder="author" class="span2" name="author" id="author"/>
        &nbsp;&nbsp;Press:
            <input type="text" value="" placeholder="press" class="span2" name="press" id="press"/>
		<br/>
        Publication year:
		  <select class="span3" tabindex="1" name="year" id="year">
            <option value="" selected="selected"></option>
			<option value="1">1900-1950</option>
            <option value="2">1951-1980</option>
            <option value="3">1981-1990</option>
            <option value="4">1991-2000</option>
            <option value="5">2001-2010</option>
			<option value="6">after 2011(including 2011)</option>
          </select>
          &nbsp;&nbsp;Price:
		  <select class="span3" tabindex="1" name="price" id="price">
            <option value="" selected="selected"></option>
			<option value="1">&lt;=20 yuan</option>
            <option value="2">21-50 yuan</option>
            <option value="3">50-100 yuan</option>
			<option value="4">&gt;100 yuan</option>
          </select>
			&nbsp;&nbsp;<input type="submit" value="search" class="span2 btn btn-warning you"/>
      </div> <!-- /row -->
	  </fieldset>

	  </form>
	  
	  
	  <p>
	  <?php 
		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}

		mysql_select_db("library", $con);
		mysql_query("SET NAMES utf-8");
		
		$print=($_REQUEST['category']||$_REQUEST['title']||$_REQUEST['author']||$_REQUEST['press']||$_REQUEST['year']||$_REQUEST['price']);
		
			$category=$_REQUEST['category'];
			$title=$_REQUEST['title'];
			$author=$_REQUEST['author'];
			$publisher=$_REQUEST['press'];
			$yearNO=$_REQUEST['year'];
			$priceNO=$_REQUEST['price'];
		
		$where="category !='sdfsfsdfsfsdf'";
		
		if($category){
			$where .= "and category='$category'";
		}
		
		if($title){
			$where .= "and title='$title'";
		}
		
		if($author){
			$where .= "and author='$author'";
		}
		
		if($publisher){
			$where .= "and press='$publisher'";
		}
		
		switch($yearNO){
			case 1:	$where .="and year between 1900 and 1950"; break;
			case 2:	$where .="and year between 1951 and 1980"; break;
			case 3:	$where .="and year between 1981 and 1990"; break;
			case 4:	$where .="and year between 1991 and 2000"; break;
			case 5:	$where .="and year between 2001 and 2010"; break;
			case 6:	$where .="and year>=2011"; break;
			default: break;
		}
		
		switch($priceNO){
			case 1:	$where .="and price<=20"; break;
			case 2:	$where .="and price between 21 and 50"; break;
			case 3:	$where .="and price between 51 and 100"; break;
			case 4:	$where .="and price>100"; break;
			default: break;
		}
		
		$book=mysql_query("select bno,category,title,press,year,author,round(price,2),total,stock
							from book where $where order by title");
		if($print){
		if(!$book)
			echo "The book you search for doesn't exist!";
		else{
			echo "<table id='result'>
					<caption><big><strong>Result</strong></big></caption>
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
			echo "</tbody><br />";
		}
		}
		
		mysql_close($con);
	  ?>
	  </p>

    
    </div> <!-- /container -->
	

	
  </body>
</html>
