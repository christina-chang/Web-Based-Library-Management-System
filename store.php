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
.location {
	position: relative;
	top: 80px;
}

.wid{
	position: relative;
	left: 35px;

}

.you{
	position: relative;
	left: 55px;
}

#out{
	position: relative;
	left: 210px;
}

</style>
	
	<script  type="text/javascript">

	function checkcard(){
		if(document.card.cno.value==""||document.card.name.value==""||document.card.department.value==""||document.card.type.value==""){
			alert('Please input the information of the library card!');
			return false;
		}
		else{
			alert('Add library card succseefully!');
			return true;
		}
		
	}
	
	function booksCheck(){
		if(document.books.bookfile.value==""){
			alert('Please select the book file!');
			return false;
		}
		else{
			alert('Store books succseefully!');
			return true;
		}
		
	}
	
	function bookCheck(){
		if(document.bookin.bno.value==""||document.bookin.category.value==""||document.bookin.title.value==""||document.bookin.author.value==""
		||document.bookin.press.value==""||document.bookin.year.value==""||document.bookin.price.value==""||document.bookin.total.value==""){
			alert('Please input the information of the book!');
			return false;
		}
		else{
			alert('Store book succseefully!');
			return true;
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
	
	<br/><br/><br/>
	<div class="you">
	<form name="books" action="books.php" method="post" enctype="multipart/form-data" onSubmit="return booksCheck();">
		<div class="row">
			<label for="file"><h4><strong>Store Books in a List</strong></h4></label>
			<div>
			Path:
			<input type="file" name="bookfile" id="bookfile" class="span8"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" value="Store"  class=" btn span2 btn-primary"/>
			</div>
      </div> <!-- /row -->
	  </form>
	</div>
	 
	<br/><br/><br/><br/>
	<div class="wid">
	<h4><strong>Store one Book</strong></h4>
	<form name="bookin" action="bookin.php" method="post" onSubmit="return bookCheck();">
	  <div class="row" >
		<div class="span2">
			<label for="text">Bno:</label>
            <input type="text" value="" placeholder="bno" name="bno" id="bno" class="span2"/>
        </div>
        <div class="span2">
			<label for="text">Category:</label>
            <input type="text" value="" placeholder="category" class="span2" name="category" id="category"/>
        </div>
        <div class="span2">
		<label for="text">Title:</label>
		  <input type="text" value="" placeholder="title" class="span2" name="title" id="title"/>
        </div>
		<div class="span2">
		<label for="text">Author:</label>
            <input type="text" value="" placeholder="author" class="span2" name="author" id="author"/>
        </div>
	</div>
		<div class="row">
		<div class="span2">
		<label for="text">Press:</label>
            <input type="text" value="" placeholder="press" class="span2" name="press" id="press"/>
        </div>

		<div class="span2">
        <label for="text">Publication year:</label>
		  <input type="text" value="" placeholder="publication year" class="span2" name="year" id="year"/>
        </div>
		<div class="span2">
          <label for="text">Price:</label>
		  <input type="text" value="" placeholder="price" class="span2" name="price" id="price"/>
        </div>
		<div class="span2">
          <label for="text">Total:</label>
		  <input type="text" value="" placeholder="total" class="span2" name="total" id="total"/>
        </div>
		<div class="span2">
            <input type="submit" value="Store" class="span2 btn btn-primary" />
        </div>
		
      </div> <!-- /row -->
	  </form>
	 </div>
	 
  </body>
</html>
